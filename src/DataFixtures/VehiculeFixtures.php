<?php

namespace App\DataFixtures;

use App\Entity\Vehicule;
use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class VehiculeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        // Récupérer tous les clients déjà en base
        $clients = $manager->getRepository(Client::class)->findAll();

        $marques = ['Peugeot', 'Renault', 'Citroën', 'Toyota', 'BMW', 'Mercedes', 'Volkswagen', 'Ford'];
        $couleurs = ['Rouge', 'Bleu', 'Noir', 'Gris', 'Blanc', 'Vert', 'Jaune'];

        for ($i = 0; $i < 200; $i++) {
            $vehicule = new Vehicule();
            $vehicule->setMarque($faker->randomElement($marques));
            $vehicule->setModele($faker->word());
            $vehicule->setImmatriculation(strtoupper($faker->bothify('??-###-??')));
            $vehicule->setAnnee($faker->numberBetween(2000, 2024));
            $vehicule->setCouleur($faker->randomElement($couleurs));
            $vehicule->setClient($faker->randomElement($clients));

            $manager->persist($vehicule);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ClientFixtures::class, // S'assurer que les clients sont chargés avant
        ];
    }
}

