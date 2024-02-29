<?php
declare(strict_types=1);

namespace App;

use PDO;
use App\Factories\PDOFactory;
use App\Utils\{ DBConfig, YamlReader };

/**
 *
 */
final class App
{

	public function getConnection(): PDO
	{
		$data = (new YamlReader())->getData(__DIR__ . "/../../.config.yml");

		return (new PDOFactory())->createPDOfrom(new DBConfig(...$data["dbconfig"]));
	}
}