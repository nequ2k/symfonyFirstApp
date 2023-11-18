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
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/movies', name: 'app_movies')]
    public function index(): Response
    {
        // findAll = SELECT * FROM movies;
        // find() = SELECT * FROM movies where id = 5;
        // findBy() = SELECT * FROM movies ORDER BY id DESC;
        // findOneBy() = SELECT * FROM movies WHERE id = 6 AND title = 'The Dark Knight' ORDER BY id DESC;
        //SELECT COUNT(*) WHERE id = 5


        return $this->render('index.html.twig');
    }



}
