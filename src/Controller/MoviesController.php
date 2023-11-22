<?php

namespace App\Controller;

use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Movie;

class MoviesController extends AbstractController
{

    private $em;

    private $movieRepository;
    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    #[Route('/movies', name: 'app_movies')]
    public function index(): Response
    {
        // findAll = SELECT * FROM movies;
        // find() = SELECT * FROM movies where id = 5;
        // findBy() = SELECT * FROM movies ORDER BY id DESC;
        // findOneBy() = SELECT * FROM movies WHERE id = 6 AND title = 'The Dark Knight' ORDER BY id DESC;
        //SELECT COUNT(*) WHERE id = 5

        $movies = $this->movieRepository->findAll();

        return $this->render('movies/index.html.twig', [
            'movies' => $movies
        ]);
    }



}
