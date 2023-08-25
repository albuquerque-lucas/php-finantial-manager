<?php
require_once __DIR__ . '/vendor/autoload.php';
use AlbuquerqueLucas\PhpTestRouting\Controller\FrontController;
use AlbuquerqueLucas\PhpTestRouting\Infrastructure\Router;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$router = new Router();
$frontController = new FrontController();

$router->get('/', [$frontController, 'handle']);

$router->run();