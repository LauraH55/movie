<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Movies;

class MoviesController extends AbstractController
{
    /**
     * @Route("/movies", name="movies")
     */
    public function index()
    {

        $movies = $this->getDoctrine()
        ->getRepository(Movies::class)
        ->findBy([], ['name' =>'ASC'], 20, 0);
        return $this->render('movies/index.html.twig', [
            'controller_name' => 'MoviesController',
            'movies' => $movies
        ]);
    }
}
