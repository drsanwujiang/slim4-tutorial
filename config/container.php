<?php

use Psr\Container\ContainerInterface;
use Selective\Config\Configuration;
use Slim\App;
use Slim\Factory\AppFactory;

return [
    App::class => function (ContainerInterface $container) {
        AppFactory::setContainer($container);
        $app = AppFactory::create();

        return $app;
    },

    Configuration::class => function () {
        return new Configuration(require __DIR__ . "/settings.php");
    },

    PDO::class => function (ContainerInterface $container) {
        $config = $container->get(Configuration::class);

        $host = $config->getString("db.host");
        $dbname =  $config->getString("db.database");
        $username = $config->getString("db.username");
        $password = $config->getString("db.password");
        $charset = $config->getString("db.charset");
        $flags = $config->getArray("db.flags");
        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

        return new PDO($dsn, $username, $password, $flags);
    },
];