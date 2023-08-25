<?php

namespace AlbuquerqueLucas\PhpTestRouting\Controller;

use AlbuquerqueLucas\PhpTestRouting\Helper\EntityManagerCreator;
use AlbuquerqueLucas\PhpTestRouting\Views\ProjectsView;
use Doctrine\ORM\Exception\EntityManagerClosed;

class ProjectsController {
  public function renderProjectsPublic() {
    $projects = ['Projeto 1', 'Projeto 2', 'Projeto 3'];
    $entityManager = EntityManagerCreator::create();
    var_dump($entityManager);
    exit();
    $view = new ProjectsView();
    $view->assign('title', 'Projetos | Financial Manager');
    $view->assign('projects', $projects);
    $view->render('publicProjects.php');
  }
}