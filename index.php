<?php
require_once __DIR__ . '/vendor/autoload.php';
use AlbuquerqueLucas\PhpTestRouting\Controller\FrontController;
use AlbuquerqueLucas\PhpTestRouting\Controller\ProductController;
use AlbuquerqueLucas\PhpTestRouting\Controller\CategoriesController;
use AlbuquerqueLucas\PhpTestRouting\Infrastructure\Router;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$router = new Router();
$frontController = new FrontController();
$productsController = new ProductController();
$categoriesController = new CategoriesController();

$router->get('/', [$frontController, 'renderHome']);
$router->get('/products', [$productsController, 'renderProductsPublic']);
$router->post('/products', [$productsController, 'create']);
$router->get('/categories', [$categoriesController, 'renderCategoriesPublic']);
$router->post('/categories', [$categoriesController, 'create']);

$router->run();