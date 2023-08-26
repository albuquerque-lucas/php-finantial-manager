<?php

namespace AlbuquerqueLucas\PhpTestRouting\Controller;

use AlbuquerqueLucas\PhpTestRouting\Entity\Product;
use AlbuquerqueLucas\PhpTestRouting\Helper\EntityManagerCreator;
use AlbuquerqueLucas\PhpTestRouting\Views\ProjectsView;

class ProjectsController {
  public function renderProjectsPublic() {
    $entityManager = EntityManagerCreator::create();
    $productsRepository = $entityManager->getRepository(Product::class);
    $products = $productsRepository->findAll();
    $view = new ProjectsView();
    $view->assign('title', 'Produtos | Financial Manager');
    $view->assign('projects', $products);
    $view->render('publicProjects.php');
  }
}