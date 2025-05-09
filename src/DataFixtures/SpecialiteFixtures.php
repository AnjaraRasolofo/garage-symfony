<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Specialite;

class SpecialiteFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $specialite = ['Moteur', 'Electricite', 'Electronique', 'Trains roulants', 'Freins', 
                        'Pneumatique', 'Boite de vitesse', 'Boite de transfert', 'Transmission', 'Tolerie', 
                        'Peinture', 'Soudure', 'Adaptation', 'Pompe injection', 'Habitacle', 'Climatisation'];
        
        for($i=0; $i<count($specialite); $i++) {
            
            $spec = new Specialite();

            $spec->setNom($specialite[$i]);

            $manager->persist($spec);

        }

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['specialite'];
    }
}
