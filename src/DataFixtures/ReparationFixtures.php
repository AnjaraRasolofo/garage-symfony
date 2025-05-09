<?php

namespace App\DataFixtures;

use App\Entity\Reparation;
use App\Entity\Vehicule;
use App\Entity\Employe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ReparationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $vehicules = $manager->getRepository(Vehicule::class)->findAll();
        $employes = $manager->getRepository(Employe::class)->findAll();
        $statuses = ['en attente', 'en cours', 'terminée'];

        for ($i = 0; $i < 30; $i++) {
            $reparation = new Reparation();
            $reparation->setVehicule($faker->randomElement($vehicules));
            $reparation->setDescription($faker->sentence(6, true));
            $reparation->setDateReparation($faker->dateTimeBetween('-6 months', 'now'));
            $reparation->setStatus($faker->randomElement($statuses));
            $reparation->setPrix($faker->randomFloat(2, 50, 1500));
            
            // Associer un employé à la réparation
            if (count($employes) > 0) {
                $reparation->addEmploye($faker->randomElement($employes));
            }

            $manager->persist($reparation);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            VehiculeFixtures::class,
            EmployeFixtures::class,
        ];
    }
}

