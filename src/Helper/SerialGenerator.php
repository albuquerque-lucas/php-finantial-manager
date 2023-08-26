<?php

namespace AlbuquerqueLucas\PhpTestRouting\Helper;

class SerialGenerator {
  public static function generateRandom(int $length): int {
    $min = pow(10, $length -1);
    $max = pow(10, $length) -1;
    return mt_rand($min, $max);
  }
}