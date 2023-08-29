<?php

namespace AlbuquerqueLucas\PhpTestRouting\Controller;

use AlbuquerqueLucas\PhpTestRouting\Views\HomeView;

class FrontController {
  public function renderHome() {
    $view = new HomeView();
    $view->assign('title', 'Pagina Inicial');
    $view->render('home');
  }

  public function renderNotFound() {
    $view = new HomeView();
    $view->assign('title', 'Pagina Inicial');
    $view->render('notFound');
  }
}