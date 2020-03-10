<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AbonneController extends AbstractController
{
    /**
     * @Route("/abonne", name="abonne")
     */
    public function index()
    {
        return $this->render('abonne/index.html.twig', [
            'controller_name' => 'AbonneController',
        ]);
    }
}
