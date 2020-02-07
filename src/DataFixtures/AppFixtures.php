<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    private $slugger;
    private $boolean;

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        $color = ['Bleu', 'Vert', 'Rouge'];
        // créer les produits
        for ($i = 1; $i <= 30; ++$i) {
            $product = new Product();
            $product->setName('iPhone '.$i);
            $product->setSlug('super telephone'.$i);
            $product->setDescription($faker->text());
            $product->setFavorite($faker->boolean);
            $product->setColor($faker->randomElements($color, rand(0, count($color))));
            $product->setPrice($faker->numberBetween(99, 999));
            $manager->persist($product);
        }

        $manager->flush();
    }
}
