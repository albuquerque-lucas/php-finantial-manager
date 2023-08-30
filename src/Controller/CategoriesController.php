<?php

namespace AlbuquerqueLucas\PhpTestRouting\Controller;

use AlbuquerqueLucas\PhpTestRouting\Middleware\CategoryMiddleware;
use AlbuquerqueLucas\PhpTestRouting\Service\ProductCategoryService;
use AlbuquerqueLucas\PhpTestRouting\Service\AddressCategoryService;
use AlbuquerqueLucas\PhpTestRouting\Service\PhoneCategoryService;
use AlbuquerqueLucas\PhpTestRouting\Views\CategoriesView;

class CategoriesController {
  private $middleware;
  private $productService;
  private $addressService;
  private $phoneService;
  public function __construct()
  {
    $this->middleware = new CategoryMiddleware();
    $this->productService = new ProductCategoryService();
    $this->addressService = new AddressCategoryService();
    $this->phoneService = new PhoneCategoryService();
  }
  public function renderProductCategories() {
    $data = $this->productService->getAll();
    $view = new CategoriesView();
    $view->assign('data', $data);
    $view->render('productCategories');
  }
  public function createProductCategory()
  {
    $body = $this->middleware->validate();
    $result = $this->productService->create($body);
    header('Location: /categories');
  }
  public function renderAddressCategories()
  {
    $data = $this->addressService->getAll();
    $view = new CategoriesView();
    $view->assign('data', $data);
    $view->render('addressCategories');
  }
  public function createAddressCategory()
  {
    $body = $this->middleware->validate();
    $result = $this->addressService->create($body);
    header('Location: /address-categories');
  }
  public function renderPhoneCategories()
  {
    $data = $this->phoneService->getAll();
    $view = new CategoriesView();
    $view->assign('data', $data);
    $view->render('phoneCategories');
  }

  public function createPhoneCategories()
  {
    $body = $this->middleware->validate();
    $result = $this->phoneService->create($body);
    header('Location: /phone-categories');
  }
}