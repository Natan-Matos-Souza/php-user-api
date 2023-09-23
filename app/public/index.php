<?php

require "../../vendor/autoload.php";

use Psr\Htpp\Message\ResponseInterface as Response;
use Psr\Htpp\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Dotenv\Dotenv;

$path = "../../";

$dotenv = Dotenv::createImmutable($path);

$dotenv->load();

$app = AppFactory::create();

require "../routes/Routes.php";

$app->run();