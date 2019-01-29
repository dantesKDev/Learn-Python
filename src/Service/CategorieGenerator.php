<?php

namespace App\Service;
use App\Entity\Categorie;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


use Doctrine\ORM\EntityManager;

class CategorieGenerator {

  // private $em;
  //
  // public function __construct(EntityManager $em){
  //   $this->em = $em
  // }

  public function getCategorieList(){
    $repo = $this->getDoctrine()->getRepository(Categorie::class);
    $categories = $repo->findAll();

    return $categories;
  }
}
