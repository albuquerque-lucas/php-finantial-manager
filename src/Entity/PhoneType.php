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
class PhoneType {
  #[Id, GeneratedValue, Column]
  private int $id;
  public function __construct(
    #[Column]
    private string $name,
    #[Column]
    private int $serial,
    #[OneToMany(targetEntity:PhoneNumber::class, mappedBy:'phoneType')]
    private Collection $phoneNumbers
    )
  {
    $this->phoneNumbers = new ArrayCollection();
  }
  public function id(): string
  {
    return $this->id;
  }
  public function name(): string
  {
    return $this->name;
  }
  public function serial(): string
  {
    return $this->serial;
  }
  public function addNumber(PhoneNumber $phoneNumber): void
  {
    $this->phoneNumbers->add($phoneNumber);
    $phoneNumber->setType($this);
  }
  public function phones(): Collection
  {
    return $this->phoneNumbers;
  }
}