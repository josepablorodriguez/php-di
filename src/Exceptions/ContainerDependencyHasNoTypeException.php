<?php
declare(strict_types=1);

namespace src\Exceptions;

use Exception;
use Psr\Container\ContainerExceptionInterface;

class ContainerDependencyHasNoTypeException extends Exception implements ContainerExceptionInterface
{

}