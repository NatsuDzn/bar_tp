<?php


namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

use App\Entity\Client;
use App\Entity\Statistic;

class StatisticFixtures extends Fixture implements DependentFixtureInterface
{
  public function load(ObjectManager $manager)
  {
    $clientInfo = [
      ['Ismael Oconnor','balistreri.sydni@hotmail.com', 80, 17, 22],
      ['Danika Dickson','cole.chadd@yahoo.com', 70, 15, 23],
      ['Ellie Noble','xoberbrunner@yahoo.com', 71, 23, 24],
      ['Naima Huffman','berge.randy@gmail.com', 75, 14, 25],
      ['Bethany Cobb','williamson.elta@stamm.com', 83, 41, 26],
      ['Santino Cowan','durgan.laurianne@yahoo.com', 81, 21, 27],
      ['Slade Holder','kkessler@hotmail.com', 69, 32, 28],
      ['Madden Powell','qbernier@yahoo.com', 78, 12, 29],
      ['Santos Silva','adams.yasmin@glover.biz', 74, 11, 30],
      ['Charity Weaverr','cgoldner@gmail.com', 68, 9, 31],
    ];


    foreach ($clientInfo as list($name, $email, $weight, $number_beer, $age)) {
      $client = new Client();
      $client->setName($name);
      $client->setEmail($email);
      $client->setWeight($weight);
      $client->setNumberBeer($number_beer);
      $client->setAge($age);
      $manager->persist($client);
    }

    $manager->flush();
  }

  public function getDependencies()
  {
    return array(
      AppFixtures::class,
    );
  }
}
