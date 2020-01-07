<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Authors;

class AuthorsController extends AbstractController
{
    /**
     * @Route("/author/{id}", name="author")
     */
    public function author($id)
    {
      $author = $this->getDoctrine()
      ->getRepository(Authors::class)
      ->find($id);
      dump($author);
      return $this->render('authors/author.html.twig', [
          'author' => $author
      ]);
    }
}
