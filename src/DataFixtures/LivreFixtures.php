<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Livre;

class LivreFixtures extends BaseFixture
{
    public function loadData(ObjectManager $manager)
    {
        $this->createMany(50, "livre", function($num){
            $auteur = $this->faker->firstName . " " . strtoupper($this->faker->lastName);
            $titre = $this->faker->sentence(5, true);
            return (new Livre)->setAuteur($auteur)
                              ->setTitre($titre);
        });
        $manager->flush();
    }
}
