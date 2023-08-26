<?php

namespace AlbuquerqueLucas\PhpTestRouting\Controller;

use AlbuquerqueLucas\PhpTestRouting\Entity\Category;
use AlbuquerqueLucas\PhpTestRouting\Helper\EntityManagerCreator;
use AlbuquerqueLucas\PhpTestRouting\Helper\SerialGenerator;
use AlbuquerqueLucas\PhpTestRouting\Views\CategoriesView;
use Doctrine\Common\Collections\ArrayCollection;

class CategoriesController {
  public function renderCategoriesPublic() {
    $entityManager = EntityManagerCreator::create();
    $categoriesRepository = $entityManager->getRepository(Category::class);
    $categories = $categoriesRepository->findAll();
    $view = new CategoriesView();
    $view->assign('title', 'Categorias | Financial Manager');
    $view->assign('categories', $categories);
    $view->render('publicCategories.php');
  }

  public function create():void
  {
    $name = filter_input(INPUT_POST, 'category-name', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'category-description', FILTER_SANITIZE_STRING);
    $serial = SerialGenerator::generateRandom(8);
    $productList = new ArrayCollection();
    $category = new Category($name, $serial, $description, $productList);
    $entityManager = EntityManagerCreator::create();
    $categoriesRepository = $entityManager->getRepository(Category::class);
    $foundCategory = $categoriesRepository->findOneBy(['serial' => $serial]);
    if(!$foundCategory) {
      $entityManager->persist($category);
      $entityManager->flush();
      header('Location: /categories');
    } else {
      header('Location: /categories');
    }
  }
}