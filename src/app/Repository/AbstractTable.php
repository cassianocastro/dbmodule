<?php
declare(strict_types=1);

namespace App\Repository;

use App\Factories\SQLFactory as Factory;
use App\Dao\DBService as Service;

/**
 *
 */
abstract class AbstractTable
{

	protected const TABLENAME = "";
	protected const COLUMNS   = [];

	protected Service $service;

	public function __construct(Service $service)
	{
		$this->service = $service;
	}

	public function getName(): string
	{
		return static::TABLENAME;
	}

	public function getColumns(): array
	{
		return static::COLUMNS;
	}

	public function getAll(): iterable
	{
		$sql = (new Factory())->createSelect($this);

		$sql->appendOrderByClause(["nome"]);

        return $this->service->fetch($sql, null);
	}

    public function findByName(string $name): iterable
    {
        $sql = (new Factory())->createSelect($this);

		$sql->appendWhereClause(condition: "nome = ?");

        return $this->service->fetch($sql, [ $name ]);
    }
}