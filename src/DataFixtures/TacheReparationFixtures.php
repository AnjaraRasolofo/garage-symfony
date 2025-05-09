<?php

namespace App\DataFixtures;

use App\Entity\TacheReparation;
use App\Entity\Reparation;
use App\Entity\Employe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;

class TacheReparationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        $reparations = $manager->getRepository(Reparation::class)->findAll();
        $employes = $manager->getRepository(Employe::class)->findAll();

        for ($i = 0; $i < 10; $i++) {
            $tacheReparation = new TacheReparation();
            
            // Associer une réparation et un employé
            $tacheReparation->setReparation($faker->randomElement($reparations));
            $tacheReparation->setEmploye($faker->randomElement($employes));

            $tacheReparation->setDescription($faker->sentence());
            $tacheReparation->setStatus($faker->randomElement(['Non commencé', 'En cours', 'Terminé']));
            $tacheReparation->setDateDebut($faker->dateTimeThisMonth());
            $tacheReparation->setDateFin($faker->dateTimeThisMonth());

            $manager->persist($tacheReparation);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ReparationFixtures::class,
            EmployeFixtures::class,
        ];
    }
}

