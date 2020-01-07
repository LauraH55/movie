<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Movies;

class MoviesController extends AbstractController
{
    /**
     * @Route("/movies", name="movies")
     */
    public function index(Request $request)
    {

        $search = (string) $request->query->get('search' , null);

        $movies = $this->getDoctrine()
        ->getRepository(Movies::class)
        ->createQueryBuilder('m')
        ->where('m.name LIKE :name')
        ->setParameter('name', '%' . $search .'%')
        ->orderBy('m.name')
        ->setMaxResults(20)
        ->getQuery()
        ->execute();

        return $this->render('movies/index.html.twig', [
            'controller_name' => 'MoviesController',
            'movies' => $movies
        ]);
    }

    /**
     * @Route("/movie/{id}", name="movie")
     */
    public function movie($id)
    {
      $movie = $this->getDoctrine()
      ->getRepository(Movies::class)
      ->find($id);
      dump($movie);
      return $this->render('movies/movie.html.twig', [
          'movie' => $movie
      ]);
    }
}
