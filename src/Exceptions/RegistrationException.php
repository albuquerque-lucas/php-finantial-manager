<?php

namespace AlbuquerqueLucas\PhpTestRouting\Exceptions;
use Exception;

class InvalidA extends Exception {
  private string $type;
  public function __construct($message, string $type){
    parent::__construct($message);
    $this->type = $type;
  }




}