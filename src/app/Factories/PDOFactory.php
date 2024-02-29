<?php
declare(strict_types=1);

namespace App\Factories;

use PDO, PDOException;
use App\Utils\DBConfig;

/**
 *
 */
final class PDOFactory
{

    public function createPDOfrom(DBConfig $config): PDO
    {
        try {
            return new PDO(
                $config->getDSN(),
                $config->getUser(),
                $config->getPassword(),
                [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}