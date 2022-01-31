<?php
declare(strict_types=1);

namespace Creational;

use DAO\{ Query };

/**
 *
 */
final class SQLFactory
{

	public function createInsert(string $table, array $columns, array $values): Query
	{
		array_shift($columns);

		$columns = implode(", ", $columns);
		$values  = implode(", ", $values);

		return new Query("INSERT INTO $table ($columns) VALUES ($values)");
	}

	public function createSelect(string $table, array $columns): Query
    {
		$columns = implode(", ", $columns);

        return new Query("SELECT $columns FROM $table");
    }

	public function createUpdate(string $table, array $kvList, string $condition): Query
	{
		array_shift($kvList);

		for ($i = 0, $size = count($kvList); $i < $size; $i++) {
			$kvList[$i] .= " = ?";
		}
		$kvList = implode(", ", $kvList);

		return new Query("UPDATE $table SET $kvList WHERE $condition");
	}

	public function createDelete(string $table, string $condition = "id = ?"): Query
	{
		return new Query("DELETE FROM $table WHERE $condition");
	}
}