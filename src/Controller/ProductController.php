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
    $view->assign('products', $products);
    $view->assign('categories', $categories);
    $view->render('publicProducts.php');
  }

  public function create() {
    $title = filter_input(INPUT_POST, 'product-title', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'product-description', FILTER_SANITIZE_STRING);
    $price = floatval(filter_input(INPUT_POST, 'product-price', FILTER_DEFAULT));
    $categoryId = filter_input(INPUT_POST, 'product-category', FILTER_DEFAULT);
    $urlImage = "https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg";
    $entityManager = EntityManagerCreator::create();
    $categoriesRepository = $entityManager->getRepository(Category::class);
    $category = $categoriesRepository->findOneBy(['id' => $categoryId]);
    $product = new Product($title, $description, $price, $urlImage, $category);
    $entityManager->persist($product);
    $entityManager->flush();
    header('Location: /products');
  }
}