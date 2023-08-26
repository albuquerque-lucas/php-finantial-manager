<?php

namespace AlbuquerqueLucas\PhpTestRouting\Controller;

use AlbuquerqueLucas\PhpTestRouting\Entity\Product;
use AlbuquerqueLucas\PhpTestRouting\Helper\EntityManagerCreator;
use AlbuquerqueLucas\PhpTestRouting\Views\ProductsView;

class ProductController {
  public function renderProductsPublic() {
    $entityManager = EntityManagerCreator::create();
    $productsRepository = $entityManager->getRepository(Product::class);
    $products = $productsRepository->findAll();
    $view = new ProductsView();
    $view->assign('title', 'Produtos | Financial Manager');
    $view->assign('projects', $products);
    $view->render('publicProducts.php');
  }
}