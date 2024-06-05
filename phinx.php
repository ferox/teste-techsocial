<?php

require 'vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

return [
    'paths' => [
        'migrations' => 'db/migrations',
        'seeds' => 'db/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'development',
        'development' => [
            'adapter' => 'pgsql',
            'host' => $_ENV['DB_HOST'],
            'name' => $_ENV['DB_NAME'],
            'user' => $_ENV['DB_USER'],
            'pass' => $_ENV['DB_PASS'],
            'port' => $_ENV['DB_PORT'],
            'charset' => 'utf8',
        ],
        'testing' => [
            'adapter' => 'pgsql',
            'host' => $_ENV['TEST_DB_HOST'],
            'name' => $_ENV['TEST_DB_NAME'],
            'user' => $_ENV['TEST_DB_USER'],
            'pass' => $_ENV['TEST_DB_PASS'],
            'port' => $_ENV['TEST_DB_PORT'],
            'charset' => 'utf8',
        ],
    ],
];
