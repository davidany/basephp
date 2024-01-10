<?php

// Require the Composer autoloader, if not already loaded
require __DIR__.'/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();


$exampleText = $_ENV['EXAMPLE_TEXT'];

echo $exampleText;
