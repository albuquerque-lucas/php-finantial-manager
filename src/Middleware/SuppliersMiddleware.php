<?php

namespace AlbuquerqueLucas\PhpTestRouting\Middleware;

class SuppliersMiddleware {
  public function validate(): array
  {
    $firstName = filter_input(INPUT_POST, 'supplier-firstname', FILTER_SANITIZE_STRING);
    $lastName = filter_input(INPUT_POST, 'supplier-lastname', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'supplier-email', FILTER_VALIDATE_EMAIL);
    return [];
  }
}