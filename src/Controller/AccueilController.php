<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\LivreRepository;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     *On enlève le /accueil pour qu'il ne reste que le "/"
     */
    public function index(LivreRepository $livreRepo)
    //LivreRepository pour interroger la BDD avec sa variable
    //App\Repository\LivreRepository également.
    {
        $liste_livres = $livreRepo->findAll();
        //Pour avoir toute la liste des livres
        return $this->render('accueil/index.html.twig', compact("liste_livres"));
        //Inverse de compact, extract?
    }
    /**
     * @Route("/auteur/{auteur}", name="rechercher_auteur")
     */
     public function rech(LivreRepository $livreRepo, $auteur)
     //LivreRepository pour interroger la BDD avec sa variable
     //App\Repository\LivreRepository également.
     {
         $liste_livres = $livreRepo->findByAuteur($auteur);
         //findByAuteur que l'on a crée dans le repository de livre
         return $this->render('accueil/index.html.twig', compact("liste_livres"));
     }

}
