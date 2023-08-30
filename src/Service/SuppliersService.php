<?php
namespace AlbuquerqueLucas\PhpTestRouting\Service;

use AlbuquerqueLucas\PhpTestRouting\Entity\AddressType;
use AlbuquerqueLucas\PhpTestRouting\Entity\PhoneType;
use AlbuquerqueLucas\PhpTestRouting\Entity\Supplier;
use AlbuquerqueLucas\PhpTestRouting\Helper\EntityManagerCreator;
class SuppliersService {
  public function getAll():array
  {
    $entityManager = EntityManagerCreator::create();
    $suppliersRepo = $entityManager->getRepository(Supplier::class);
    $suppliers = $suppliersRepo->findAll();
    $result = [
      'title' => 'Fornecedores | Financial Manager',
      'suppliers' => $suppliers,
    ];
    return $result;
  }
  public function getAllCreate():array
  {
    $entityManager = EntityManagerCreator::create();
    $phoneTypesRepo = $entityManager->getRepository(PhoneType::class);
    $addressTypesRepo = $entityManager->getRepository(AddressType::class);
    $phoneCategories = $phoneTypesRepo->findAll();
    $addressCategories = $addressTypesRepo->findAll();
    $result = [
      'title' => 'Cadastro Fornecedores | Financial Manager',
      'phone-types' => $phoneCategories,
      'address-type' => $addressCategories,
    ];
    return $result;
  }
  // public function create($body): array
  // {
  //   if (array_key_exists('error', $body)) {
  //     return [
  //       'message' => 'Nao foi possivel criar categoria',
  //       'data' => $body['error'],
  //       'status' => 'ERROR',
  //     ];
  //   }
  //   $entityManager = EntityManagerCreator::create();
  //   $categoriesRepository = $entityManager->getRepository(Category::class);
  //   $category = $categoriesRepository->findOneBy(['id' => $body['category-id']]);
  //   $product = new Product($body['title'], $body['description'], $body['price'], $body['url-image'], $category);
  //   $entityManager->persist($product);
  //   $entityManager->flush();
  //   $this->serialize();
  //   return [
  //     'data' => $product,
  //     'status' => 'SUCCESS',
  //   ];
  // }

  // public function delete(int $id):array
  // {
  //   $entityManager = EntityManagerCreator::create();
  //   $product = $entityManager->find(Product::class, $id);
  //   $entityManager->remove($product);
  //   $entityManager->flush();
  //   return [
  //     'data' => $id,
  //     'status' => 'SUCCESS',
  //   ];
  // }

  // public function serialize()
  // {
  //   $entityManager = EntityManagerCreator::create();
  //   $productsRepository = $entityManager->getRepository(Product::class);
  //   $products = $productsRepository->findBy(['serial' => null]);
  //   foreach ($products as $product):
  //     $product->setSerial();
  //   endforeach;
  //   $entityManager->flush();
  // }
}