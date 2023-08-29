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
class AddressType {
  #[Id, GeneratedValue, Column]
  private int $id;
  public function __construct(
    #[Column]
    private string $name,
    #[OneToMany(targetEntity:Address::class, mappedBy:'typeAddress')]
    private Collection $addresses
    )
  {
    $this->addresses = new ArrayCollection();
  }
  public function name(): string
  {
    return $this->name;
  }
  public function addAddress(Address $address): void
  {
    $this->addresses->add($address);
    $address->setType($this);
  }
  public function addresses(): Collection
  {
    return $this->addresses;
  }
}