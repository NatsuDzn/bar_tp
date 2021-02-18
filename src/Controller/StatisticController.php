<?php

namespace App\Controller;

use App\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StatisticController extends AbstractController
{
    /**
     * @Route("/statistics", name="statistics")
     */
    public function statistics(): Response
    {
        $clientRepo = $this->getDoctrine()->getRepository(Client::class);
        $clients = $clientRepo->findClientsByOrder();

        return $this->render('statistic/statistics.html.twig', [
            'title' => 'Statistiques',
            'clients' => $clients,
        ]);
    }
}
