<?php

namespace AlbuquerqueLucas\PhpTestRouting\Repository;
use AlbuquerqueLucas\PhpTestRouting\Helper\EntityManagerCreator;
use AlbuquerqueLucas\PhpTestRouting\Entity\Project;
use Doctrine\ORM\EntityRepository;

class ProjectRepository extends EntityRepository{
  private $entityManager;

  public function __construct(){
    $this->entityManager = EntityManagerCreator::create();
  }

  public function create(
    string $title,
    string $description,
    string $urlImage,
    string $urlRepo
  )
  {
    $project = new Project($title, $description, $urlImage, $urlRepo);
    $this->entityManager->persist($project);
    $this->entityManager->flush();
  }

  public function getAll()
  {
    
  }
}