<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
  public function getFilters(): array
  {
      return [
          new TwigFilter('average', [$this, 'getClientBeerAverage']),
          new TwigFilter('deviation', [$this, 'standardDeviation']),
      ];
  }

  public function getClientBeerAverage($clients): float
  {
      $beerTotal = $this->getBeerTotal($clients);
      return round($beerTotal / count($clients), 2);
  }

  public function getBeerTotal($clients)
  {
      $beerNumber = 0;
      foreach ($clients as $client) {
          $beerNumber += $client->getNumberBeer();
      }
      return $beerNumber;
  }

  public function standardDeviation($clients): float
  {
    $averageBeer = $this->getClientBeerAverage($clients);
    $sum = 0;
    $clientNumber = 0;

    foreach ($clients as $client) {
      $clientNumber++;
      $totalBeerBoughtByClient = $client->getNumberBeer();
      $sum += ($totalBeerBoughtByClient - $averageBeer) ** 2;
    }

    return round(sqrt($sum / $clientNumber), 2);
  }
}