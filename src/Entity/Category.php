<?php

namespace AlbuquerqueLucas\PhpTestRouting\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\OneToMany;
#[Entity]
class Category {
  #[Id, GeneratedValue, Column]
  private int $id;
  public function __construct(
    #[Column(length:100)]
    private string $name,
    #[Column(length:50)]
    private int $serial,
    #[OneToMany(targetEntity:Product::class, mappedBy:'category')]
    private Collection $products
  ){
    $this->products = new ArrayCollection();
  }

  public function id(): int
  {
    return $this->id;
  }

  public function addProduct(Product $product): void
  {
    $this->products->add($product);
    $product->setCategory($this);
  }

  public function products(): Collection
  {
    return $this->products;
  }

  public function name(): string
  {
    return $this->name;
  }
  public function serial(): int
  {
    return $this->serial;
  }
}