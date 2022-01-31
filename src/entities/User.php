<?php
declare(strict_types=1);

namespace Entities;

/**
 *
 */
final class User
{

	private int $id;
	private string $name;
    private string $password;

    public function __construct(string $name, string $password, int $id = 0)
    {
		$this->id       = $id;
        $this->name     = $name;
        $this->password = $password;
    }

	public function getID(): int
	{
		return $this->id;
	}

    public function getName(): string
    {
        return $this->name;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}