<?php

namespace AlbuquerqueLucas\PhpTestRouting\Middleware;
use AlbuquerqueLucas\PhpTestRouting\Helper\EntityManagerCreator;
use AlbuquerqueLucas\PhpTestRouting\Helper\SerialGenerator;
use Doctrine\Common\Collections\ArrayCollection;

class CategoryMiddleware {
    public function validate() {
      $name = filter_input(INPUT_POST, 'category-name', FILTER_SANITIZE_STRING);
      $description = filter_input(INPUT_POST, 'category-description', FILTER_SANITIZE_STRING);
      $serial = SerialGenerator::generateRandom(3);
      $productList = new ArrayCollection();
        
        return [
            'name' => $name,
            'description' => $description,
            'serial' => $serial,
            'product-list' => $productList,
        ];
    }
}
