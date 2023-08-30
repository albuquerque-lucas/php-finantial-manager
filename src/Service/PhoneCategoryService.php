<?php
namespace AlbuquerqueLucas\PhpTestRouting\Service;

use AlbuquerqueLucas\PhpTestRouting\Entity\PhoneType;
use AlbuquerqueLucas\PhpTestRouting\Helper\EntityManagerCreator;
class PhoneCategoryService {
  public function getAll(): array
  {
    $entityManager = EntityManagerCreator::create();
    $categoriesRepository = $entityManager->getRepository(PhoneType::class);
    $categories = $categoriesRepository->findAll();
    $result = [
      'title' => 'Categorias de Telefones | Financial Manager',
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
    $phoneTypesRepository = $entityManager->getRepository(PhoneType::class);
    $foundType = $phoneTypesRepository->findOneBy(['serial' => $body['serial']]);
    if(!$foundType) {
      $newCategory = new PhoneType($body['name'], $body['serial'], $body['list']);
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