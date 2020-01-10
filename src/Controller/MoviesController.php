<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Movies;

class MoviesController extends AbstractController
{
    /**
     * @Route("/movies", name="movies")
     * @param Request $request
     * @return Response
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
     * @param $id
     * @return Response
     */
    public function movie($id)
    {
      $movie = $this->getDoctrine()
      ->getRepository(Movies::class)
      ->find($id);

      if (!$movie) {
        return $this->redirectToRoute('movies');
      }

      
      return $this->render('movies/movie.html.twig', [
          'movie' => $movie
      ]);
    }
}
