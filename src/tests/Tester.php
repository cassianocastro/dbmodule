<?php
declare(strict_types=1);

namespace Tests;

use App\App;
use App\Dao\DBService;
use App\Entities\User;
use App\Repository\UserTable;

/**
 *
 */
final class Tester
{

    public function getUserTable(): UserTable
    {
        $connection = (new App())->getConnection();

        return new UserTable(new DBService($connection));
    }

    /**
     * @test
     */
    public function canInsertUser(): void
    {
		self::getUserTable()->insert(new User(0, "Test3", "30"));
    }

    /**
     * @test
     */
    public function canUpdateUser(): void
    {
		self::getUserTable()->update(new User(17, "Mariele", "35"));
    }

    /**
     * @test
     */
    public function canDeleteUser(): void
    {
		self::getUserTable()->delete(new User(21, "", ""));
    }

    /**
     * @test
     */
    public function canGetAllUsers(): void
    {
		$registers = self::getUserTable()->getAll();

		print_r($registers);
    }

    /**
     * @test
     */
    public function canFindUserByName(): void
    {
        $user = self::getUserTable()->findByName("Test3");

        print_r($user);
    }
}