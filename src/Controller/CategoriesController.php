<?php

namespace AlbuquerqueLucas\PhpTestRouting\Controller;

use AlbuquerqueLucas\PhpTestRouting\Middleware\CategoryMiddleware;
use AlbuquerqueLucas\PhpTestRouting\Service\CategoryService;
use AlbuquerqueLucas\PhpTestRouting\Views\CategoriesView;

class CategoriesController {
  private $middleware;
  private $service;
  public function __construct()
  {
    $this->middleware = new CategoryMiddleware();
    $this->service = new CategoryService();
  }
  public function renderCategoriesPublic() {
    $data = $this->service->getAll();
    $view = new CategoriesView();
    $view->assign('data', $data);
    $view->render('categories');
  }

  public function create()
  {
    $body = $this->middleware->validate();
    $result = $this->service->create($body);
    header('Location: /categories');
  }
}