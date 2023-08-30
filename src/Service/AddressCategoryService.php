<?php
namespace AlbuquerqueLucas\PhpTestRouting\Service;

use AlbuquerqueLucas\PhpTestRouting\Entity\AddressType;
use AlbuquerqueLucas\PhpTestRouting\Helper\EntityManagerCreator;
use Doctrine\Common\Collections\ArrayCollection;
class AddressCategoryService {
  public function getAll(): array
  {
    $entityManager = EntityManagerCreator::create();
    $categoriesRepository = $entityManager->getRepository(AddressType::class);
    $categories = $categoriesRepository->findAll();
    $result = [
      'title' => 'Categorias de Endereco | Financial Manager',
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
    $addressTypesRepository = $entityManager->getRepository(AddressType::class);
    $foundType = $addressTypesRepository->findOneBy(['serial' => $body['serial']]);
    if(!$foundType) {
      $newCategory = new AddressType($body['name'], $body['serial'], $body['list']);
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