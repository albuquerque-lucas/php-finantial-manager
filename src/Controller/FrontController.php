<?php

namespace AlbuquerqueLucas\PhpTestRouting\Controller;

use AlbuquerqueLucas\PhpTestRouting\Views\HomeView;

class FrontController {
  public function handle() {
    $view = new HomeView();
    $view->assign('title', 'Pagina Inicial');
    $view->render('publicHome.php');
  }
}