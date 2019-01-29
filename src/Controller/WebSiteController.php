<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Categorie;
use App\Service\CategorieGenerator;

class WebSiteController extends AbstractController
{
    /**
     * @Route("/Home/", name="web_site")
     */
    public function index(CategorieGenerator $categorieGenerator)
    {

      $repo = $this->getDoctrine()->getRepository(Categorie::class);
      $categories = $repo->findAll();
      // $categories = $categorieGenerator->getCategorieList();

      $params = array(
        'categories' => $categories,
        'controller_name' => 'WebSiteController'
      );
      return $this->render('web_site/index.html.twig', $params);

    }
}
