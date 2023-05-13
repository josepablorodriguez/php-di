<?php
declare(strict_types=1);

namespace src;

use ReflectionClass;
use ReflectionException;
use ReflectionParameter;
use src\Exceptions\ContainerDependencyHasNoTypeException;
use src\Exceptions\ContainerDependencyNotInstantiableException;
use src\Exceptions\DependencyHasNoDefaultValueException;
use src\Exceptions\DependencyIsNotInstantiableException;
//use src\Exceptions\ContainerDependencyNotFoundException;
use src\Interfaces\ContainerInterface;

abstract class Container implements ContainerInterface
{
	private array $entries = [];

	public function set(string $id, callable $specific){
		$this->entries[$id] = $specific;
	}
	public function get($id){
		if($this->has($id)){
			$entry = $this->entries[$id];
			return $entry($this);
		}
		return $this->resolve($id);
	}
	public function has($id): bool{
		return isset($this->entries[$id]);
	}
	//PRIVATE


	/**
	 * @throws ReflectionException
	 * @throws ContainerDependencyNotInstantiableException
	 * @throws ContainerDependencyHasNoTypeException
	 */
	private function resolve($id){
		// 1. Check if Dependency is Instantiable.
		$reflection = new ReflectionClass($id);
		if(!$reflection->isInstantiable()){
			$dini_exception = "Dependency with id: '$id' is not instantiable";
			throw new ContainerDependencyNotInstantiableException($dini_exception);
		}
		// 2. Check if Dependency has a constructor.
		$constructor = $reflection->getConstructor();
		if(null == $constructor){
			return $reflection->newInstance();
		}
		// 3. Check if Dependency requires parameters AKA other Dependencies.
		$parameters = $constructor->getParameters();
		if(count($parameters) === 0 or !is_array($parameters)){
			return $reflection->newInstance();
		}
		// 4. Check if those parameters AKA other Dependencies are classes.
		$dependencies = array_map(function(ReflectionParameter $param) use ($id){
			$name = $param->getName();
			$type = $param->getType();
			if(null === $type){
				$dhnt_exception = "Failed to resolve Dependency class '$id' because its param '$name' is missing a type hint";
				throw new ContainerDependencyHasNoTypeException($dhnt_exception);
			}
		},$parameters);


		/*$dependencies = $this->getDependencies($parameters, $reflection);
		return $reflection->newInstanceArgs($dependencies);*/
	}
}