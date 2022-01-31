<?php
declare(strict_types=1);

namespace Tables;

use Entities\User;
use Creational\SQLFactory;
use DAO\DBService;

/**
 *
 */
final class UserTable
{

    private const TABLENAME = "alunos";
    private const COLUMNS   = array("id", "nome", "idade");

	private DBService $service;

    public function __construct(DBService $service)
    {
        $this->service = $service;
    }

	public function insert(User $user): bool
	{
		$sql = (new SQLFactory())->createInsert(
			self::TABLENAME, self::COLUMNS, ["?", "?"]
		);
		$array[] = $user->getName();
		$array[] = $user->getPassword();

		return $this->service->execute($sql, $array);
	}

	public function update(User $user): bool
	{
		$sql = (new SQLFactory())->createUpdate(
			self::TABLENAME, self::COLUMNS, "id = ?"
		);
		$array[] = $user->getName();
		$array[] = $user->getPassword();
		$array[] = $user->getID();

		return $this->service->execute($sql, $array);
	}

	public function delete(User $user): bool
	{
		$sql     = (new SQLFactory())->createDelete(self::TABLENAME);
		$array[] = $user->getID();

		return $this->service->execute($sql, $array);
	}

	public function getAll(): array
	{
		$sql = (new SQLFactory())->createSelect(self::TABLENAME, self::COLUMNS);

        return $this->service->fetch($sql, null);
	}

    public function findByName(string $name): array
    {
        $sql = (new SQLFactory())->createSelect(self::TABLENAME, self::COLUMNS);
		$sql->appendWhereClause(condition: "nome = ?");

        return $this->service->fetch($sql, [ $name ]);
    }
}