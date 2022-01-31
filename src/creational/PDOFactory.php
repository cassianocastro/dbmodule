<?php
declare(strict_types=1);

namespace Creational;

use PDO, PDOException;
use Helpers\DatabaseConfig;

/**
 *
 */
final class PDOFactory
{

    public function createPDOfrom(DatabaseConfig $config): PDO
    {
        try {
            return new PDO(
                $config->getDSN(),
                $config->getUser(),
                $config->getPassword()
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}