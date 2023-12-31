<?php
namespace AlbuquerqueLucas\PhpTestRouting\Service;

use AlbuquerqueLucas\PhpTestRouting\Entity\Category;
use AlbuquerqueLucas\PhpTestRouting\Entity\Product;
use AlbuquerqueLucas\PhpTestRouting\Helper\EntityManagerCreator;
class ProductService {
  public function getAll(): array
  {
    $entityManager = EntityManagerCreator::create();
    $productsRepository = $entityManager->getRepository(Product::class);
    $categoriesRepository = $entityManager->getRepository(Category::class);
    $categories = $categoriesRepository->findAll();
    $products = $productsRepository->findAll();
    $result = [
      'title' => 'Produtos | Financial Manager',
      'products' => $products,
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
    $category = $categoriesRepository->findOneBy(['id' => $body['category-id']]);
    $product = new Product($body['title'], $body['description'], $body['price'], $body['url-image'], $category);
    $entityManager->persist($product);
    $entityManager->flush();
    $this->serialize();
    return [
      'data' => $product,
      'status' => 'SUCCESS',
    ];
  }

  public function delete(int $id):array
  {
    $entityManager = EntityManagerCreator::create();
    $product = $entityManager->find(Product::class, $id);
    $entityManager->remove($product);
    $entityManager->flush();
    return [
      'data' => $id,
      'status' => 'SUCCESS',
    ];
  }

  public function serialize()
  {
    $entityManager = EntityManagerCreator::create();
    $productsRepository = $entityManager->getRepository(Product::class);
    $products = $productsRepository->findBy(['serial' => null]);
    foreach ($products as $product):
      $product->setSerial();
    endforeach;
    $entityManager->flush();
  }
}