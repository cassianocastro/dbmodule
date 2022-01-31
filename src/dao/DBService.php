<?php
declare(strict_types=1);

namespace DAO;

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

    public function execute(Query $query, array $params): bool
    {
		try {
			$statement = $this->pdo->prepare($query->__toString());

			for ($i = 1, $size = count($params); $i <= $size; $i++) {
				$statement->bindValue($i, $params[$i - 1]);
			}

			return $statement->execute();
		} catch (Exception $e) {
			die($e->getMessage());
		}
    }

	public function fetch(Query $query, ?array $params): array
	{
		try {
			$statement = $this->pdo->prepare($query->__toString());

			if ( ! is_null($params) ) {
				for ($i = 1, $size = count($params); $i <= $size; $i++) {
					$statement->bindValue($i, $params[$i - 1]);
				}
			}
			$statement->execute();

			return $statement->fetchAll(PDO::FETCH_ASSOC);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}