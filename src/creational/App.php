<?php
declare(strict_types=1);

namespace Creational;

use PDO;
use Helpers\{ DatabaseConfig, YamlReader };

/**
 *
 */
final class App
{

	public function getConnection(): PDO
	{
		$data = (new YamlReader())->getData(__DIR__ . "/../../.config.yml");

		return (new PDOFactory())->createPDOfrom(new DatabaseConfig(...$data));
	}
}