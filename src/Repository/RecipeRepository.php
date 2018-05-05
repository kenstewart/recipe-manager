<?php

namespace App\Repository;

use App\Entity\Recipe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\RegistryInterface;

class RecipeRepository extends ServiceEntityRepository
{
   public function __construct(RegistryInterface $registry)
   {
       parent::__construct($registry, Recipe::class);
   }

}