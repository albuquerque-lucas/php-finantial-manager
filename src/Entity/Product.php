<?php

namespace AlbuquerqueLucas\PhpTestRouting\Entity;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
#[Entity]
class Product {
  #[Id]
  #[GeneratedValue]
  #[Column]
  public readonly int $id;
  public function __construct(
    #[Column]
    public readonly string $title,
    #[Column]
    public readonly string $description,
    #[Column]
    public readonly float $price,
    #[Column]
    public readonly string $urlImage
  ){
  }
}