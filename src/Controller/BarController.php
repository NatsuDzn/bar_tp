<?php

namespace App\Controller;

use App\Entity\Beer;
use App\Entity\Category;
use App\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BarController extends AbstractController
{

    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        $beerRepo = $this->getDoctrine()->getRepository(Beer::class);

        $beers = $beerRepo->getBeersWithLimit(3);

        return $this->render('home/home.html.twig', [
            'title' => 'Accueil',
            'beers' => $beers,
        ]);
    }

    /**
     * @Route("/mentions", name="mentions")
     */
    public function mentions(): Response
    {
        return $this->render('mentions/mentions.html.twig', [
            'title' => 'Mentions légales',
        ]);
    }

    public function mainMenu(string $routeName, string $category_id): Response
    {
        $categoryRepo = $this
            ->getDoctrine()
            ->getRepository(Category::class);

        $categories = $categoryRepo->findBy(['term' => 'normal']);

        $clientRepo = $this->getDoctrine()->getRepository(Client::class);
        $clients = $clientRepo->findAll();

        return $this->render('partials/menu.html.twig', [
            'routeName' => $routeName,
            'category_id' => $category_id,
            'categories' => $categories,
            'clients' => $clients,
        ]);
    }
}
