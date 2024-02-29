<?php
declare(strict_types=1);

namespace App\Utils;

/**
 *
 */
final class DBConfig
{

	private readonly string $dsn;
    private readonly string $user;
    private readonly string $password;

    public function __construct(string $dsn, string $user, string $password)
    {
        $this->dsn      = $dsn;
        $this->user     = $user;
        $this->password = $password;
    }

    public function getDSN(): string
    {
        return $this->dsn;
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}