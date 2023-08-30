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
      $serial = SerialGenerator::generateRandom(3);
      $list = new ArrayCollection();
      $validateBody = [
        'name' => $name,
        'serial' => $serial,
        'list' => $list,
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
          'serial' => $serial,
          'list' => $list,
      ];
      }
        return $body;
      }
}
