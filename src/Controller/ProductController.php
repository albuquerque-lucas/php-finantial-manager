<?php

namespace AlbuquerqueLucas\PhpTestRouting\Controller;

use AlbuquerqueLucas\PhpTestRouting\Views\ProductsView;
use AlbuquerqueLucas\PhpTestRouting\Service\ProductService;
use AlbuquerqueLucas\PhpTestRouting\Middleware\ProductMiddleware;

class ProductController {
  private $middleware;
  private $service;
  public function __construct()
  {
    $this->middleware = new ProductMiddleware();
    $this->service = new ProductService();
  }
  public function renderProductsPublic() {
    $data = $this->service->getAll();
    $view = new ProductsView();
    $view->assign('data', $data);
    $view->render('publicProducts.php');
  }

  public function create() {
    $body = $this->middleware->validate();
    $newProduct = $this->service->create($body);
    header('Location: /products');
  }
}