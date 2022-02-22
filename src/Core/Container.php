<?php

namespace Usanzadunje\Core;

use Closure;
use Exception;
use ReflectionClass;
use ReflectionException;
use Usanzadunje\Core\Extendable\Singleton;

class Container
{
    private array $instances = [];

    public function set($abstract, $concrete = null)
    {
        if (is_null($concrete)) {
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

        if ($reflector->isSubclassOf(Singleton::class)) {
            return call_user_func([$reflector->getName(), 'getInstance']);
        }

        if (!$reflector->isInstantiable()) {
            throw new Exception("Class $concrete is not instantiatable.");
        }

        $constructor = $reflector->getConstructor();

        if (is_null($constructor)) {
            return $reflector->newInstance();
        }

        $parameters = $constructor->getParameters();
        $dependencies = $this->resolveDependencies($parameters);

        return $reflector->newInstanceArgs($dependencies);
    }

    /**
     * @throws ReflectionException
     * @throws Exception
     */
    private function resolveDependencies(array $parameters): array
    {
        $dependencies = [];

        foreach ($parameters as $parameter) {
            $dependency = $parameter->getClass();

            if (is_null($dependency)) {
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