<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Repository\AnimalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AnimalController extends AbstractController
{
    /**
     * @Route("/animaux", name="app_animaux_index")
     */
    public function index()
    {
        // Le controleur doit faire appel au modèle pour aller récupérer les animaux
        // dans la base de données

        // 1. Le controleur doit recupérer un objet de type AnimalRepository
        $repository = $this->getDoctrine()->getRepository(Animal::class);
        // On demande à doctrine de lancer une requête : SELECT * FROM Animal
        // On récupère le résultat dans un tableau d'animaux
        // $animaux : tableau d'objets de type Animal
        $animaux = $repository->findAll();

        // Le controleur fait appel à la vue en lui passant le resultat $animaux
        return $this->render('animal/index.html.twig', [
            "animaux" =>  $animaux
        ]);

    }

    /**
     * @Route("/animaux{id}", name="app_animaux_show")
     */
    public function show($id, AnimalRepository $repository)
    {
        $animal = $repository->find($id);
        return $this->render('animal/show.html.twig', [
            "animal" =>  $animal
        ]);

    }
}
