<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
       /* $a1 = new Animal();
        $a1->setNom("Chien")
           ->setDescription("C'est un animal .........")
           ->setImage("chien.png")
           ->setPoids(40)
           ->setDangereux(false) ;
        $manager->persist($a1);

        $a2 = new Animal();
        $a2->setNom("Requin")
            ->setDescription("Le requin est un animal .........")
            ->setImage("requin.png")
            ->setPoids(300)
            ->setDangereux(true);
        $manager->persist($a2);

        $manager->flush();*/
    }
}
