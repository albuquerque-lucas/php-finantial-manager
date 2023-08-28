<?php

namespace AlbuquerqueLucas\PhpTestRouting\Controller;

use AlbuquerqueLucas\PhpTestRouting\Entity\Category;
use AlbuquerqueLucas\PhpTestRouting\Helper\EntityManagerCreator;
use AlbuquerqueLucas\PhpTestRouting\Helper\SerialGenerator;
use AlbuquerqueLucas\PhpTestRouting\Middleware\CategoryMiddleware;
use AlbuquerqueLucas\PhpTestRouting\Service\CategoryService;
use AlbuquerqueLucas\PhpTestRouting\Views\CategoriesView;
use Doctrine\Common\Collections\ArrayCollection;

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
    $view->render('publicCategories.php');
  }

  public function create():void
  {
    $body = $this->middleware->validate();
    $result = $this->service->create($body);
    header('Location: /categories');
  }
}