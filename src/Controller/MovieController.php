<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Movie;
use Doctrine\ORM\EntityManagerInterface;

class MovieController extends AbstractController
{
    #[Route('/movie', name: 'app_movie')]
    public function index(EntityManagerInterface $entityManager): Response
    {

        $repository = $entityManager->getRepository(Movie::class);
        $movies = $repository->findAll();

        return $this->render('movie/index.html.twig', [
            'movies' => $movies,
        ]);
    }
}
