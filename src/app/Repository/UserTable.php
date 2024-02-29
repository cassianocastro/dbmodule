<?php
declare(strict_types=1);

namespace App\Repository;

use App\Dao\DBService as Service;
use App\Entities\User;
use App\Factories\SQLFactory as Factory;

/**
 *
 */
final class UserTable extends AbstractTable
{

    protected const TABLENAME = "alunos";
    protected const COLUMNS   = ["id", "nome", "idade"];

    public function __construct(Service $service)
    {
        parent::__construct($service);
    }

	public function insert(User $user): void
	{
		$sql     = (new Factory())->createInsert($this, ["?", "?"]);
		$array[] = $user->getName();
		$array[] = $user->getPassword();

		$this->service->execute($sql, $array);
	}

	public function update(User $user): void
	{
		$sql     = (new Factory())->createUpdate($this, "id = ?");
		$array[] = $user->getName();
		$array[] = $user->getPassword();
		$array[] = $user->getID();

		$this->service->execute($sql, $array);
	}

	public function delete(User $user): void
	{
		$sql     = (new Factory())->createDelete($this);
		$array[] = $user->getID();

		$this->service->execute($sql, $array);
	}
}