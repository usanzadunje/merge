<?php

namespace Usanzadunje\Core;

use Closure;
use Exception;
use ReflectionClass;
use ReflectionException;
use ReflectionParameter;
use Usanzadunje\Core\Extendable\Singleton;
use Usanzadunje\Database\Model;

class Container
{
    private array $instances = [];

    public function set($abstract, $concrete = null): void
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
    private function resolve($concrete, array $parameters): mixed
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
                $dependencies[] = $this->getParameterDefaultValue($parameter);
            }else {
                $dependencies[] = $this->get($dependency->name);
            }
        }

        return $dependencies;
    }

    /**
     * @throws Exception
     */
    private function getParameterDefaultValue(ReflectionParameter $parameter): mixed
    {
        if ($parameter->isDefaultValueAvailable()) {
            return $parameter->getDefaultValue();
        }else {
            throw new Exception("Cannot resolve class dependency $parameter");
        }
    }

    /**
     * @throws ReflectionException
     */
    public function resolveFunctionDependencies($abstract, $methodName): array
    {
        $reflector = new ReflectionClass($abstract);

        $methodReflector = $reflector->getMethod($methodName);

        $parameters = $methodReflector->getParameters();

        return $this->resolveDependencies($parameters);
    }

    /**
     * @throws ReflectionException
     * @throws Exception
     */
    public function resolveActionDependencies($abstract, $methodName): array
    {
        $reflector = new ReflectionClass($abstract);

        $methodReflector = $reflector->getMethod($methodName);

        $parameters = $methodReflector->getParameters();

        $resolvedParameters = [];

        foreach ($parameters as $parameter) {
            $parameterName = $parameter->getName();

            if ($parameter->getClass()?->isSubclassOf(Model::class)) {
                $modelClass = $parameter->getType()->getName();
                $resolvedParameters[] = (new $modelClass())->find(route()->paramValues($parameterName));
            }else if ($parameter->getClass()) {
                $resolvedParameters[] = $this->resolve($parameter->getType()->getName(), []);
            }else if (in_array($parameterName, route()->paramNames())) {
                $resolvedParameters[] = route()->paramValues($parameterName);
            }else {
                $resolvedParameters[] = $this->getParameterDefaultValue($parameter);
            }
        }

        return $resolvedParameters;
    }
}