<?php

namespace App\Controller;

use App\Entity\Beer;
use App\Entity\Country;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CountryController extends AbstractController
{
    /**
     * @Route("/country/{id}", name="country")
     * @param int $id
     * @return Response
     */
    public function country(int $id): Response
    {
        $beerRepo = $this
            ->getDoctrine()
            ->getRepository(Beer::class);
        $countryRepo = $this->getDoctrine()->getRepository(Country::class);

        $beerFromCountry = $beerRepo->findBy(['country' => $id]);
        $country = $countryRepo->find($id);

        return $this->render('country/country.html.twig', [
            'beersFromCountry' => $beerFromCountry,
            'country' => $country,
        ]);
    }
}
