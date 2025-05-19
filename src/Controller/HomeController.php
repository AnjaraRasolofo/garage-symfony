<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\VehiculeRepository;
use App\Repository\ReparationRepository;
use App\Repository\EmployeRepository;
use App\Repository\FactureRepository;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(VehiculeRepository $vehiculeRepo, ReparationRepository $reparationRepo, EmployeRepository $employeRepo, FactureRepository $factureRepo): Response
    {
        
        $vehiculesRepares = $vehiculeRepo->countRepares();
        $nombreReparations = $reparationRepo->count([]);
        //$mecaniciensDisponibles = $employeRepo->countDisponibles(); // custom
        $facturesEnCours = $factureRepo->count(['status' => 'en cours']);

        return $this->render('home/index.html.twig', [
            'vehiculesRepares' => $vehiculesRepares,
            'nombreReparations' => $nombreReparations,
            //'mecaniciensDisponibles' => $mecaniciensDisponibles,
            'facturesEnCours' => $facturesEnCours,
        ]);
    }
}
