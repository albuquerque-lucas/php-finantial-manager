<?php
namespace AlbuquerqueLucas\PhpTestRouting\Service;

use AlbuquerqueLucas\PhpTestRouting\Entity\Category;
use AlbuquerqueLucas\PhpTestRouting\Entity\Product;
use AlbuquerqueLucas\PhpTestRouting\Helper\EntityManagerCreator;
class CategoryService {
  public function getAll(): array
  {
    $entityManager = EntityManagerCreator::create();
    $categoriesRepository = $entityManager->getRepository(Category::class);
    $categories = $categoriesRepository->findAll();
    $result = [
      'title' => 'Categorias | Financial Manager',
      'categories' => $categories,
    ];
    return $result;
  }
  public function create($body): array
  {
    $entityManager = EntityManagerCreator::create();
    $categoriesRepository = $entityManager->getRepository(Category::class);
    $foundCategory = $categoriesRepository->findOneBy(['serial' => $body['serial']]);
    if(!$foundCategory) {
      $newCategory = new Category($body['name'], $body['serial'], $body['description'], $body['product-list']);
      $entityManager->persist($newCategory);
      $entityManager->flush();
      return [
        'data' => $newCategory,
        'status' => 'SUCCESS',
      ];
    }
    return [
      'message' => 'Nao foi possivel cadastrar categoria.',
      'status' => 'ERROR',
    ];
  }
}