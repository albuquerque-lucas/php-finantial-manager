<?php

namespace AlbuquerqueLucas\PhpTestRouting\Controller;

use AlbuquerqueLucas\PhpTestRouting\Entity\Product;
use AlbuquerqueLucas\PhpTestRouting\Helper\EntityManagerCreator;
use AlbuquerqueLucas\PhpTestRouting\Views\ProductsView;

class ProductsController {
  public function renderProductsPublic() {
    $entityManager = EntityManagerCreator::create();
    $productsRepository = $entityManager->getRepository(Product::class);
    $products = $productsRepository->findAll();
    $view = new ProductsView();
    $view->assign('title', 'Produtos | Financial Manager');
    $view->assign('projects', $products);
    $view->render('publicProjects.php');
  }
}