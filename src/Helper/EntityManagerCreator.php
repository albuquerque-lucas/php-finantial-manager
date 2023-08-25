<?php

namespace AlbuquerqueLucas\PhpTestRouting\Helper;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class EntityManagerCreator {

  public static function create()
  {
    $config = ORMSetup::createAttributeMetadataConfiguration(
      paths: array(__DIR__."/../Entity"),
      isDevMode: true,
  );
    $connection = DriverManager::getConnection([
      'driver' => 'pdo_mysql',
      'host' => 'localhost',
      'user' => 'root',
      'password' => 'mamao123mamao',
      'dbname' => 'financial_management',
    ], $config);
    $entityManager = new EntityManager($connection, $config);
    return $entityManager;
  }
}