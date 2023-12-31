<?php
use AlbuquerqueLucas\PhpTestRouting\Helper\EntityManagerCreator;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with file to your own project bootstrap
require_once 'vendor/autoload.php';

// replace with mechanism to retrieve EntityManager in your app
$entityManager = EntityManagerCreator::create();

return ConsoleRunner::createHelperSet($entityManager);