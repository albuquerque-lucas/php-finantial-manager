<?php

namespace AlbuquerqueLucas\PhpTestRouting\Controller;

use AlbuquerqueLucas\PhpTestRouting\Views\SuppliersView;
use AlbuquerqueLucas\PhpTestRouting\Service\SuppliersService;

class SuppliersController {
  // private $middleware;
  private $service;

  public function __construct()
  {
    // $this->middleware = new SuppliersMiddleware();
    $this->service = new SuppliersService();
  }
  public function renderSuppliers() {
    $data = $this->service->getAll();
    $view = new SuppliersView();
    $view->assign('data', $data);
    $view->render('suppliers');
  }

  public function renderCreate() {
    $data = $this->service->getAllCreate();
    $view = new SuppliersView();
    $view->assign('data', $data);
    $view->render('create-supplier');
  }

  public function create()
  {
    
  }
}