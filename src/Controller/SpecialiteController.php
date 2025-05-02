<?php

namespace App\Controller;

use App\Entity\Specialite;
use App\Form\SpecialiteType;
use App\Repository\SpecialiteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Knp\Component\Pager\PaginatorInterface;

#[Route('/specialite')]
final class SpecialiteController extends AbstractController
{
    #[Route(name: 'app_specialite_index', methods: ['GET'])]
    public function index(SpecialiteRepository $specialiteRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $query = $specialiteRepository->createQueryBuilder('c')->getQuery();

        $pagination = $paginator->paginate(
            $query, // Query ou tableau de données
            $request->query->getInt('page', 1), // Page courante, par défaut 1
            10 // Nombre d'éléments par page
        );

        return $this->render('specialite/index.html.twig', [
            'pagination' => $pagination,
        ]);
    }


    #[Route('/new', name: 'app_specialite_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $specialite = new Specialite();
        $form = $this->createForm(SpecialiteType::class, $specialite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($specialite);
            $entityManager->flush();

            return $this->redirectToRoute('app_specialite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('specialite/new.html.twig', [
            'specialite' => $specialite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_specialite_show', methods: ['GET'])]
    public function show(Specialite $specialite): Response
    {
        return $this->render('specialite/show.html.twig', [
            'specialite' => $specialite,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_specialite_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Specialite $specialite, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SpecialiteType::class, $specialite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_specialite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('specialite/edit.html.twig', [
            'specialite' => $specialite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_specialite_delete', methods: ['POST'])]
    public function delete(Request $request, Specialite $specialite, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$specialite->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($specialite);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_specialite_index', [], Response::HTTP_SEE_OTHER);
    }
}
