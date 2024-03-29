<?php
declare(strict_types=1);

namespace App\Utils;

/**
 *
 */
final class YamlReader
{

    public function getData(string $path): ?array
    {
        $content = yaml_parse_file($path);

		return $content;
    }
}