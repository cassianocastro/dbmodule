<?php
declare(strict_types=1);

namespace Helpers;

use DAO\DBService;
use Entities\User;
use Tables\UserTable;

/**
 *
 */
final class Tester
{

    public function test(\PDO $connection): void
    {
		$table = new UserTable(new DBService($connection));

		//$dump = $table->insert(new User("Test2", "20"));
		//$dump = $table->update(new User("Mariele", "34", 17));
		//$dump = $table->delete(new User("", "", 18));
		//$dump = $table->findByName("Test2");
		$dump = $table->getAll();

		print_r($dump);
    }
}