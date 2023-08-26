<?php

namespace AlbuquerqueLucas\PhpTestRouting\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity]
class Product {
  #[Id, GeneratedValue, Column]
  public int $id;
  public function __construct(
    #[Column]
    public readonly string $title,
    #[Column(type:'text')]
    public readonly string $description,
    #[Column]
    public readonly float $price,
    #[Column(length:300)]
    public readonly string $urlImage,
    #[ManyToOne(targetEntity:Category::class, inversedBy:'products')]
    public Category $category
  ){
  }

  public function setCategory(Category $category): void
  {
    $this->category = $category;
  }
}