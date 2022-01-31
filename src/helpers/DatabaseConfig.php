<?php
declare(strict_types=1);

namespace Helpers;

/**
 *
 */
final class DatabaseConfig
{

	private readonly string $driver;
    private readonly string $host;
    private readonly int $port;
    private readonly string $user;
    private readonly string $password;
    private readonly string $database;

    public function __construct(string $driver, string $host, int $port, string $user, string $password, string $database)
    {
        $this->driver   = $driver;
        $this->host     = $host;
        $this->port     = $port;
        $this->user     = $user;
        $this->password = $password;
        $this->database = $database;
    }

    public function getDSN(): string
    {
        return "{$this->driver}:host={$this->host};port={$this->port};dbname={$this->database}";
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