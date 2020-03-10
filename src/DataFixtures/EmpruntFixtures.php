<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Emprunt;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
//Pour pouvoir utiliser les dépendances.

class EmpruntFixtures extends BaseFixture implements DependentFixtureInterface
{
    public function loadData(ObjectManager $manager)
    {
        $this->createMany(10, "emprunt", function($num){
           $emprunt = new Emprunt;
           $dateSortie = $this->faker->dateTime("now");
           $dateRendu = $this->faker->dateTimeBetween($dateSortie, "now");
           $emprunt->setDateSortie($dateSortie)
                   ->setDateRendu($dateRendu)
                   ->setAbonne($this->getRandomReference("abonne"))
                   ->setLivre($this->getRandomReference("livre"));
                   //"abonne", "livre" font référence à deux dans createMany
            return $emprunt;
        });
        $manager->flush();
    }
    public function getDependencies(){
        return [ LivreFixtures::class, AbonneFixtures::class  ];
        //Ces deux fixtures là doivent être lancées avant EmpruntFixtures.
        //Pas besoin d'utiliser de USE, car même namespace
    }
}