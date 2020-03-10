<?php

namespace App\DataFixtures;
use App\Entity\Abonne;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AbonneFixtures extends BaseFixture
{
    public function loadData(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $this->createMany(50, "abonne", function($num){
            //"abonne" s'il est en clé étrangère dans une autre table
            //$num, quel numéro de boucle
            $prenom = $this->faker->firstName;
            $email = $prenom . "." . $this->faker->lastName . "@yopmail.com";
            return (new Abonne)->setPrenom($prenom)
                               ->setEmail($email);
        });
        $manager->flush();
    }
}
