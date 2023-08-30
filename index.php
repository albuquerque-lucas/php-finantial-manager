<?php
require_once __DIR__ . '/vendor/autoload.php';
use AlbuquerqueLucas\PhpTestRouting\Controller\FrontController;
use AlbuquerqueLucas\PhpTestRouting\Controller\ProductController;
use AlbuquerqueLucas\PhpTestRouting\Controller\CategoriesController;
use AlbuquerqueLucas\PhpTestRouting\Controller\SuppliersController;
use AlbuquerqueLucas\PhpTestRouting\Infrastructure\Router;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$router = new Router();
$frontController = new FrontController();
$productsController = new ProductController();
$categoriesController = new CategoriesController();
$suppliersController = new SuppliersController();

$router->get('/', [$frontController, 'renderHome']);
$router->get('/not-found', [$frontController, 'renderNotFound']);
$router->get('/products', [$productsController, 'renderProductsPublic']);
$router->post('/products', [$productsController, 'create']);
$router->post('/delete-product', [$productsController, 'delete']);
$router->get('/categories', [$categoriesController, 'renderProductCategories']);
$router->post('/categories', [$categoriesController, 'createProductCategory']);
$router->get('/suppliers', [$suppliersController, 'renderSuppliers']);
$router->get('/create-supplier', [$suppliersController, 'renderCreate']);
$router->get('/phone-categories', [$categoriesController, 'renderPhoneCategories']);
$router->post('/phone-categories', [$categoriesController, 'createPhoneCategories']);
$router->get('/address-categories', [$categoriesController, 'renderAddressCategories']);
$router->post('/address-categories', [$categoriesController, 'createAddressCategory']);

$router->addNotFoundHandler(function () {
  header('Location: /not-found');
  exit();
});

$router->run();