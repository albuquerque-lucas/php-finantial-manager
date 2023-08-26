<?php

namespace AlbuquerqueLucas\PhpTestRouting\Controller;

use AlbuquerqueLucas\PhpTestRouting\Entity\Product;
use AlbuquerqueLucas\PhpTestRouting\Entity\Category;
use AlbuquerqueLucas\PhpTestRouting\Helper\EntityManagerCreator;
use AlbuquerqueLucas\PhpTestRouting\Views\ProductsView;

class ProductController {
  public function renderProductsPublic() {
    $entityManager = EntityManagerCreator::create();
    $productsRepository = $entityManager->getRepository(Product::class);
    $categoriesRepository = $entityManager->getRepository(Category::class);
    $categories = $categoriesRepository->findAll();
    $products = $productsRepository->findAll();
    $view = new ProductsView();
    $view->assign('title', 'Produtos | Financial Manager');
    $view->assign('projects', $products);
    $view->assign('categories', $categories);
    $view->render('publicProducts.php');
  }
}