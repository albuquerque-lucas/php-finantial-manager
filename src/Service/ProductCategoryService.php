<?php
namespace AlbuquerqueLucas\PhpTestRouting\Service;

use AlbuquerqueLucas\PhpTestRouting\Entity\Category;
use AlbuquerqueLucas\PhpTestRouting\Helper\EntityManagerCreator;
class ProductCategoryService {
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
    if (array_key_exists('error', $body)) {
      return [
        'message' => 'Nao foi possivel criar categoria',
        'data' => $body['error'],
        'status' => 'ERROR',
      ];
    }
    $entityManager = EntityManagerCreator::create();
    $categoriesRepository = $entityManager->getRepository(Category::class);
    $foundCategory = $categoriesRepository->findOneBy(['serial' => $body['serial']]);
    if(!$foundCategory) {
      $newCategory = new Category($body['name'], $body['serial'], $body['list']);
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