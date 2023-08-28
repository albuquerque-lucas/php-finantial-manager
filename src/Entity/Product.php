<?php

namespace AlbuquerqueLucas\PhpTestRouting\Entity;

use AlbuquerqueLucas\PhpTestRouting\Helper\SerialGenerator;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity]
class Product {
  #[Id, GeneratedValue, Column]
  public int $id;
  #[Column(length:8, nullable:true)]
  public readonly int $serial;
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

  public function setSerial(): void
  {
      $serial = strval($this->category->serial) . strval(SerialGenerator::generateRandom(2)) . strval($this->id);
      $this->serial = intval($serial);
  }
}