<?php
ini_set("display_errors", true);
ini_set("display_startup_errors", true);
error_reporting(E_ALL);

setlocale(LC_ALL, "", "pt_BR.utf8");

require_once __DIR__ . '/vendor/autoload.php';

echo "<pre>";
$connection = (new Creational\App())->getConnection();
(new Helpers\Tester())->test($connection);