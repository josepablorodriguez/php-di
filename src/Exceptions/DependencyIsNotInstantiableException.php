<?php
declare(strict_types=1);

namespace src\Exceptions;

use Exception;
use src\Interfaces\NotFoundExceptionInterface;

class DependencyIsNotInstantiableException extends Exception implements NotFoundExceptionInterface
{

}