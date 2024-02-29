<?php
declare(strict_types=1);

namespace App\Dao;

use PDO, Exception;

/**
 *
 */
final class DBService
{

	private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function execute(Query $query, array $params): void
    {
		try {
			$statement = $this->pdo->prepare($query->__toString());

			for ($i = 1, $size = count($params); $i <= $size; $i++)
            {
				$statement->bindValue($i, $params[$i - 1]);
			}

			$statement->execute();
		} catch (Exception $e) {
			die($e->getMessage());
		}
    }

	public function fetch(Query $query, ?array $params): iterable
	{
		try {
			$statement = $this->pdo->prepare($query->__toString());

			if ( ! is_null($params) )
            {
				for ($i = 1, $size = count($params); $i <= $size; $i++)
                {
					$statement->bindValue($i, $params[$i - 1]);
				}
			}
			$statement->execute();

			return $statement->fetchAll();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}