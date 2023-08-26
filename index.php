<?php
require_once __DIR__ . '/vendor/autoload.php';
use AlbuquerqueLucas\PhpTestRouting\Controller\FrontController;
use AlbuquerqueLucas\PhpTestRouting\Controller\ProductController;
use AlbuquerqueLucas\PhpTestRouting\Infrastructure\Router;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$router = new Router();
$frontController = new FrontController();
$productsController = new ProductController();

$router->get('/', [$frontController, 'renderHome']);
$router->get('/products', [$productsController, 'renderProductsPublic']);

$router->run();