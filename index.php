<?php
ini_set("display_errors", true);
ini_set("display_startup_errors", true);
error_reporting(E_ALL);

setlocale(LC_ALL, "");

require_once __DIR__ . '/vendor/autoload.php';

(new Tests\Tester())->canGetAllUsers();