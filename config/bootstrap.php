<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$paths = [__DIR__ . '/../app/Models'];

$isDevMode = true;

$environment = $_ENV['ENV'];

$dbParams = [
    'development' => [
        'driver'   => 'pdo_pgsql',
        'host'     => $_ENV['DB_HOST'],
        'user'     => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASS'],
        'dbname'   => $_ENV['DB_NAME'],
    ],
    'testing' => [
        'driver'   => 'pdo_pgsql',
        'host'     => $_ENV['TEST_DB_HOST'],
        'user'     => $_ENV['TEST_DB_USER'],
        'password' => $_ENV['TEST_DB_PASS'],
        'dbname'   => $_ENV['TEST_DB_NAME'],
    ]

];

$env_db_params = [];

if ($environment === 'dev') {
    $env_db_params = $dbParams['development'];
}

if ($environment === 'test') {
    $env_db_params = $dbParams['testing'];
}

$config = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);

$connection = DriverManager::getConnection($env_db_params, $config);

$entityManager = new EntityManager($connection, $config);

return $entityManager;
