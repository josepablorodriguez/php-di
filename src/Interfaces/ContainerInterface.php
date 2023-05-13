<?php
declare(strict_types=1);

namespace src\Interfaces;

interface ContainerInterface
{
	public function get($id);
	public function has($id);
}