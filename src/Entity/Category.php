<?php

namespace AlbuquerqueLucas\PhpTestRouting\Entity;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\OneToMany;
#[Entity]
class Category {
  #[Id, GeneratedValue, Column]
  public int $id;
  public function __construct(
    #[Column(length:100)]
    public readonly string $name,
    #[Column(length:50)]
    public readonly int $code,
    #[Column(type:'text')]
    public readonly string $description,
    #[OneToMany(targetEntity:Product::class, mappedBy:'category')]
    public iterable $products
  ){
  }
}