<?php

namespace AlbuquerqueLucas\PhpTestRouting\Controller;

use AlbuquerqueLucas\PhpTestRouting\Views\ProjectsView;

class ProjectsController {
  public function renderProjectsPublic() {
    $projects = ['Projeto 1', 'Projeto 2', 'Projeto 3'];
    $view = new ProjectsView();
    $view->assign('title', 'Projetos | Financial Manager');
    $view->assign('projects', $projects);
    $view->render('publicProjects.php');
  }
}