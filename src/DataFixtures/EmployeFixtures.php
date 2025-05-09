<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Employe;
use App\Entity\Specialite; 
use Faker\Factory;

class EmployeFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create('fr_FR');
        $poste = ['Gerant', 'Secretaire', 'Agent de sécurité', 'Agent de nettoyage', 'Mécanicien', 'Electricien', 
                'Tôlier', 'Peintre', 'Aide mécanicien', 'Aide éléctricien', 'Gestionnaire de stock', 'Assistant', 
                'Aide tôlier', 'Aide peintre', 'Magasinier', 'Informaticien', 'Stagière'
            ];

        $specialites = $manager->getRepository(Specialite::class)->findAll();

        for($i=0; $i < 25; $i++) {

            $employe = new Employe();

            $employe->setNom($faker->lastName());
            $employe->setPrenom($faker->firstName());
            $employe->setEmail($faker->unique()->safeEmail());
            $employe->setTelephone($faker->phoneNumber());
            $employe->setAdresse($faker->address());
            $employe->setPoste($faker->randomElement($poste));
            $employe->setDateEmbauche($faker->dateTimeBetween('-10 years', 'now'));
            $employe->setSalaire($faker->randomFloat(2, 1500, 5000)); // Ex : entre 1500€ et 5000€

            // Ajouter 1 à 3 spécialités aléatoires
            $randomSpecialites = $faker->randomElements($specialites, rand(1, 3));
            foreach ($randomSpecialites as $spec) {
                $employe->addSpecialite($spec);
            }

            $manager->persist($employe);
        }
            
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            SpecialiteFixtures::class,
        ];
    }
}
