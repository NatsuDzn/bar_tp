<?php

namespace App\Controller;

use App\Entity\Beer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BeerController extends AbstractController
{
    /**
     * @Route("/beers", name="beers")
     */
    public function beers(): Response
    {
        $em = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository(Beer::class);

        $beers = $em->findAll();

        return $this->render('beers/beers.html.twig', [
            'beers' => $beers,
        ]);
    }

    /**
     * @Route("/beer/{id}", name="beer")
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response
    {
        $beerRepo = $this
            ->getDoctrine()
            ->getRepository(Beer::class);

            $beer = $beerRepo->find($id);

        return $this->render('beer/beer.html.twig', [
            'beer' => $beer,
        ]);
    }
}
