<?php

namespace AlbuquerqueLucas\PhpTestRouting\Middleware;
use AlbuquerqueLucas\PhpTestRouting\Helper\SerialGenerator;
use Doctrine\Common\Collections\ArrayCollection;
use Exception;
use InvalidArgumentException;

class CategoryMiddleware {
    public function validate()
    {
      $name = filter_input(INPUT_POST, 'category-name', FILTER_SANITIZE_STRING);
      $description = filter_input(INPUT_POST, 'category-description', FILTER_SANITIZE_STRING);
      $serial = SerialGenerator::generateRandom(3);
      $productList = new ArrayCollection();
      $validateBody = [
        'name' => $name,
        'serial' => $serial,
        'product-list' => $productList,
    ];
      $errorMessages = [];

      foreach($validateBody as $key => $item) {
        if ($item === '' || $item === null) {
          $message = "Campo {$key} invalido.";
          $errorMessages[] = $message;
        }
      }
      
      if(count($errorMessages) > 0) {
        $body = [
          'error' => $errorMessages
        ];
      } else {
        $body = [
          'name' => $name,
          'description' => $description,
          'serial' => $serial,
          'product-list' => $productList,
      ];
      }
        return $body;
      }
}
