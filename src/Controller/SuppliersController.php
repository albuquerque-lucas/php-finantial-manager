<?php

namespace AlbuquerqueLucas\PhpTestRouting\Controller;

use AlbuquerqueLucas\PhpTestRouting\Views\SuppliersView;

class SuppliersController {
  public function renderSuppliers() {
    $view = new SuppliersView();
    $view->assign('title', 'Fornecedores | Financial Manager');
    $view->render('suppliers');
  }
}