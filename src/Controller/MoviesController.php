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

    private $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }


    #[Route('/movies', name: 'app_movies')]
    public function index(): Response
    {
        $movies = $this->movieRepository->findAll();


        return $this->render('movies/index.html.twig', [
            'movies' => $movies,
        ]);
    }



}
