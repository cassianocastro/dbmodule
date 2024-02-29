<?php
declare(strict_types=1);

namespace App\Factories;

use App\Dao\Query;
use App\Repository\AbstractTable;

/**
 *
 */
final class SQLFactory
{

	public function createInsert(AbstractTable $table, array $values): Query
	{
		$columns = $table->getColumns();

		array_shift($columns);

		$columns = implode(", ", $columns);
		$values  = implode(", ", $values);

		return new Query("INSERT INTO {$table->getName()} ($columns) VALUES ($values)");
	}

	public function createSelect(AbstractTable $table): Query
    {
		$columns = implode(", ", $table->getColumns());

        return new Query("SELECT $columns FROM {$table->getName()}");
    }

	public function createUpdate(AbstractTable $table, string $condition): Query
	{
		$kvList = $table->getColumns();

        array_shift($kvList);

		for ( $i = 0, $size = count($kvList); $i < $size; ++$i )
        {
			$kvList[$i] .= " = ?";
		}

		$kvList = implode(", ", $kvList);

		return new Query("UPDATE {$table->getName()} SET $kvList WHERE $condition");
	}

	public function createDelete(AbstractTable $table, string $condition = "id = ?"): Query
	{
		return new Query("DELETE FROM {$table->getName()} WHERE $condition");
	}
}