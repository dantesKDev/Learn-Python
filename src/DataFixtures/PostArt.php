<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Categorie;
use App\Entity\Media;
use App\Entity\Post;
// Faker, permet de generer de fausse données
use Faker;

class PostArt extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        // On configure la langue utilisé
        $faker = Faker\Factory::create('fr_FR');

        // $medias = new Media();

        $categories = new Categorie();
        $categories->setNum("Initiation");
        $manager->persist($categories);

        $categories = new Categorie();
        $categories->setNum("Perfectionnement");
        $manager->persist($categories);

        $categories = new Categorie();
        $categories->setParentId(1)
                ->setNum("Introduction");
        $manager->persist($categories);

        $categories = new Categorie();
        $categories->setParentId(1)
                ->setNum("Les Structures de données");
        $manager->persist($categories);

        $categories = new Categorie();
        $categories->setParentId(1)
                ->setNum("Les Classes");
        $manager->persist($categories);


        $categories = new Categorie();
        $categories->setParentId(2)
                ->setNum("Lambda");
        $manager->persist($categories);

        $categories = new Categorie();
        $categories->setParentId(2)
                ->setNum("Compréhension");
        $manager->persist($categories);

        $categories = new Categorie();
        $categories->setParentId(2)
                ->setNum("Decorateur");
        $manager->persist($categories);


        for ($i=1; $i < 11; $i++) {
          // code...
          $medias = new Media();
          $medias->setTitle($faker->title)
                  ->setSrc($faker->text);
          $manager->persist($medias);

          $posts = new Post();
          $posts->setPostType($faker->name)
                  ->setMedia($medias)
                  ->setCategorie($categories)
                  ->setTitle($faker->text($maxNbChars = 20))
                  ->setDuration($faker->text($maxNbChars = 10))
                  // ->setCreateAt(new \DateTime());
                  ->setDate($faker->dateTime)
                  ->setContent($faker->text)
                  ->setStatus($faker->text($maxNbChars = 10));
          $manager->persist($posts);
        }




        $manager->flush();
    }
}
