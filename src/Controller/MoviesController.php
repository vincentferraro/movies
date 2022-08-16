<?php

namespace App\Controller;

use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    class MoviesController extends AbstractController
    {
        private $movieRepository;

        public function __construct(MovieRepository $movieRepository)
        {
            $this->movieRepository = $movieRepository;
            
        }

        #[Route('/movies', name: 'movies')]
        public function index(): Response
        {
            $movies = $this->movieRepository->findAll();
            
            return $this->render('movies/index.html.twig',[
                'movies'=> $movies
            ]);
        }

        
    }
