<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Client;
use Faker\Factory;

class ClientFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $types = ['Particulier', 'Organisme', 'Projet', 'Société', 'Association', 'Etat malagasy'];

        for ($i = 0; $i < 50; $i++) {
            $client = new Client();
            $client->setNom($faker->lastName());
            $client->setPrenom($faker->firstName());
            $client->setEmail($faker->unique()->safeEmail());
            $client->setTelephone($faker->phoneNumber());
            $client->setAdresse($faker->address());
            $client->setType($faker->randomElement($types));

            $manager->persist($client);
        }

        $manager->flush();
    }
}
