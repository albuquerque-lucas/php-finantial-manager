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
class Supplier {
  #[Id, GeneratedValue, Column]
  private int $id;
  public function __construct(
    #[Column]
    private string $firstName,
    #[Column]
    private string $lastName,
    #[Column]
    private string $email,
    #[OneToMany(targetEntity:PhoneNumber::class, mappedBy:'supplier')]
    private Collection $phoneNumbers,
    #[OneToMany(targetEntity:Address::class, mappedBy:'supplier')]
    private Collection $addresses
  )
  {
    $this->phoneNumbers = new ArrayCollection();
  }
  public function id():int
  {
    return $this->id;
  }
  public function name():string
  {
    return "{$this->firstName} {$this->lastName}";
  }
  public function firstName():string
  {
    return $this->firstName;
  }
  public function lastName():string
  {
    return $this->lastName;
  }
  public function email():string
  {
    return $this->email;
  }
  public function telephones():Collection
  {
    return $this->phoneNumbers;
  }
  public function addAddress(Address $address): void
  {
    $this->addresses->add($address);
    $address->setSupplier($this);
  }
}