<?php

namespace AlbuquerqueLucas\PhpTestRouting\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity]
class Address {
  #[Id, GeneratedValue, Column]
  private int $id;
  
  public function __construct(
    #[Column]
    private string $street,
    #[Column]
    private string $number,
    #[Column]
    private string $district,
    #[Column]
    private string $city,
    #[Column]
    private string $state,
    #[Column]
    private string $postalCode,
    #[Column]
    private string $country,
    #[ManyToOne(targetEntity:AddressType::class, inversedBy:'addresses')]
    private AddressType $addressType,
    #[ManyToOne(targetEntity:Supplier::class, inversedBy:'addresses')]
    private Supplier $supplier
    )
    {

    }
    
    public function getFullAddress(): string {
        return "{$this->street}, {$this->city}, {$this->state}, {$this->postalCode}, {$this->country}";
    }
    public function setType(AddressType $addressType):void
    {
      $this->addressType = $addressType;
    }
    public function setSupplier(Supplier $supplier):void
    {
      $this->supplier = $supplier;
    }
}
