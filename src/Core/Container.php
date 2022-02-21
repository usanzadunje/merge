<?php

namespace Usanzadunje\Core;

use Closure;
use Exception;
use ReflectionClass;
use ReflectionException;

class Container
{
    private array $instances = [];

    public function set($abstract, $concrete = null)
    {
        if ($concrete === null) {
            $concrete = $abstract;
        }

        $this->instances[$abstract] = $concrete;
    }

    /**
     * @throws ReflectionException
     */
    public function get($abstract, array $parameters = [])
    {
        if (!isset($this->instances[$abstract])) {
            $this->set($abstract);
        }

        return $this->resolve($this->instances[$abstract], $parameters);
    }

    /**
     * @throws ReflectionException
     * @throws Exception
     */
    private function resolve($concrete, array $parameters)
    {
        if ($concrete instanceof Closure) {
            return $concrete($this, $parameters);
        }

        $reflector = new ReflectionClass($concrete);

        if (!$reflector->isInstantiable()) {
            throw new Exception("Class $concrete is not instantiatable.");
        }

        $constructor = $reflector->getConstructor();

        if (is_null($constructor)) {
            return $reflector->newInstance();
        }

        $parameters = $constructor->getParameters();
        $dependencies = $this->getDependencies($parameters);

        return $reflector->newInstanceArgs($dependencies);
    }

    private function getDependencies(array $parameters)
    {
        $dependencies = [];

        foreach ($parameters as $parameter) {
            $dependency = $parameter->getClass();

            if ($dependency === null) {
                if ($parameter->isDefaultValueAvailable()) {
                    $dependencies[] = $parameter->getDefaultValue();
                }else {
                    throw new Exception("Cannot resolve class dependency $parameter");
                }
            }else {
                $dependencies[] = $this->get($dependency->name);
            }
        }

        return $dependencies;
    }
}