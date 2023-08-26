<?php

namespace AlbuquerqueLucas\PhpTestRouting\Entity;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
#[Entity]
class Category {
  #[Id]
  #[GeneratedValue]
  #[Column]
  public readonly int $id;
  public function __construct(
    #[Column]
    public readonly string $name,
    #[Column]
    public readonly int $code,
    #[Column]
    public readonly string $description
  ){
  }
}