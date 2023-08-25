<?php

namespace AlbuquerqueLucas\PhpTestRouting\Controller;
use AlbuquerqueLucas\PhpTestRouting\Views\View;

class FrontController {
  public function handle() {
    $view = new View();
    $view->render('publicHome.php');
  }
}