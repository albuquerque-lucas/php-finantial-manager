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
  private int $id;
  #[Column(length:8, nullable:true, options:["default" => null])]
  private ?int $serial;
  public function __construct(
    #[Column]
    private string $title,
    #[Column(type:'text')]
    public readonly string $description,
    #[Column]
    private float $price,
    #[Column(length:300)]
    private string $urlImage,
    #[ManyToOne(targetEntity:Category::class, inversedBy:'products')]
    private Category $category
  )
  {
    
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
  public function id()
  {
    return $this->id;
  }

  public function title()
  {
    return $this->title;
  }
  public function price()
  {
    return $this->price;
  }

  public function serial(): int | null
  {
      return $this->serial;
  }

  public function category()
  {
    return $this->category;
  }

  public function image()
  {
    return $this->urlImage;
  }
}