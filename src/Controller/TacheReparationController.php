<?php

namespace App\Controller;

use App\Entity\TacheReparation;
use App\Form\TacheReparationType;
use App\Repository\TacheReparationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/tache/reparation')]
final class TacheReparationController extends AbstractController
{
    #[Route(name: 'app_tache_reparation_index', methods: ['GET'])]
    public function index(TacheReparationRepository $tacheReparationRepository): Response
    {
        return $this->render('tache_reparation/index.html.twig', [
            'tache_reparations' => $tacheReparationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_tache_reparation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $tacheReparation = new TacheReparation();
        $form = $this->createForm(TacheReparationType::class, $tacheReparation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($tacheReparation);
            $entityManager->flush();

            return $this->redirectToRoute('app_tache_reparation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('tache_reparation/new.html.twig', [
            'tache_reparation' => $tacheReparation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tache_reparation_show', methods: ['GET'])]
    public function show(TacheReparation $tacheReparation): Response
    {
        return $this->render('tache_reparation/show.html.twig', [
            'tache_reparation' => $tacheReparation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_tache_reparation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TacheReparation $tacheReparation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TacheReparationType::class, $tacheReparation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_tache_reparation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('tache_reparation/edit.html.twig', [
            'tache_reparation' => $tacheReparation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tache_reparation_delete', methods: ['POST'])]
    public function delete(Request $request, TacheReparation $tacheReparation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tacheReparation->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($tacheReparation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_tache_reparation_index', [], Response::HTTP_SEE_OTHER);
    }
}
