<?php
declare(strict_types=1);

namespace src\Exceptions;

use Exception;
use Psr\Container\ContainerExceptionInterface;

class ContainerDependencyNotInstantiableException extends Exception implements ContainerExceptionInterface
{

}