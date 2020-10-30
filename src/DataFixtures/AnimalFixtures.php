<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;


class AnimalFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Récupérer Faker
        $faker = Faker\Factory::create('fr_FR');
        $faker->addProvider(new \Bezhanov\Faker\Provider\Avatar($faker));
        $faker->addProvider(new \Bezhanov\Faker\Provider\Placeholder($faker));
        $faker->addProvider(new \Bluemmb\Faker\PicsumPhotosProvider($faker));
        $faker->addProvider(new \Bezhanov\Faker\Provider\Species($faker));

        for ($i=0; $i<50; $i++) {
            $animal = new Animal();
            //Utiliser Faker afin d'initialiser l'animal que l'on souhaite créer
            $animal->setNom($faker->creature())
                    ->setDescription($faker->paragraph())
                    ->setImage($faker->imageUrl(150,150, true))
                    ->setPoids($faker->numberBetween(1,1000))
                    ->setDangereux($faker->boolean)
                    ;

            // Demande à Doctrine de générer l'ordre SQL INSERT
            $manager->persist($animal);
        }
        // Executer les ordres INSERT
        $manager->flush();
    }
}
