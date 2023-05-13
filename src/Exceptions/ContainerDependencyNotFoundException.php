<?php
declare(strict_types=1);

namespace src\Exceptions;

use Exception;
use Psr\Container\NotFoundExceptionInterface;

class ContainerDependencyNotFoundException extends Exception implements NotFoundExceptionInterface
{

}