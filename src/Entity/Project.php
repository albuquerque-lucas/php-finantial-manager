<?php

namespace AlbuquerqueLucas\PhpTestRouting\Entity;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
#[Entity]
class Project {
  #[Id]
  #[GeneratedValue]
  #[Column]
  public readonly int $id;
  public function __construct(
    #[Column]
    public readonly string $title,
    #[Column]
    public readonly string $description,
    #[Column]
    public readonly string $urlImage,
    #[Column]
    public readonly string $urlRepo
  ){
  }
}