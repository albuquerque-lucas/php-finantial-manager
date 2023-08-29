<?php

namespace AlbuquerqueLucas\PhpTestRouting\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\ManyToOne;
#[Entity]
class PhoneNumber {
  #[Id, GeneratedValue, Column]
  private int $id;
  public function __construct(
    #[Column(length:3)]
    private string $countryCode,
    #[Column(length:3)]
    private string $areaCode,
    #[Column(length:10)]
    private string $localCode,
    #[ManyToOne(targetEntity:PhoneType::class, inversedBy:'phoneNumbers')]
    private PhoneType $phoneType,
    #[ManyToOne(targetEntity:Supplier::class, inversedBy:'phoneNumbers')]
    private Supplier $supplier
  )
  {

  }
  public function phone(): string
  {
    $firstGroup = substr($this->localCode, 0, 4);
    $secondGroup = substr($this->localCode, 4);
    return "+{$this->countryCode} ({$this->areaCode}) {$firstGroup}-{$secondGroup}";
  }
  public function areaCode(): string
  {
    return $this->areaCode;
  }
  public function localCode(): string
  {
    return $this->localCode;
  }
  public function type(): PhoneType
  {
    return $this->phoneType;
  }

  public function setType(PhoneType $phoneType): void
  {
    $this->phoneType = $phoneType;
  }
}