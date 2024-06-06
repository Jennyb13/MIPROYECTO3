<?php

namespace App\Controller;

use App\Entity\MascotasAnimales;
use App\Form\MascotasAnimalesType;
use App\Repository\MascotasAnimalesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/animales')]
class AnimalesController extends AbstractController
{
    #[Route('/', name: 'app_animales_index', methods: ['GET'])]
    public function index(MascotasAnimalesRepository $mascotasAnimalesRepository): Response
    {
        return $this->render('animales/index.html.twig', [
            'mascotas_animales' => $mascotasAnimalesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_animales_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $mascotasAnimale = new MascotasAnimales();
        $form = $this->createForm(MascotasAnimalesType::class, $mascotasAnimale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($mascotasAnimale);
            $entityManager->flush();

            return $this->redirectToRoute('app_animales_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('animales/new.html.twig', [
            'mascotas_animale' => $mascotasAnimale,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_animales_show', methods: ['GET'])]
    public function show(MascotasAnimales $mascotasAnimale): Response
    {
        return $this->render('animales/show.html.twig', [
            'mascotas_animale' => $mascotasAnimale,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_animales_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, MascotasAnimales $mascotasAnimale, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MascotasAnimalesType::class, $mascotasAnimale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_animales_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('animales/edit.html.twig', [
            'mascotas_animale' => $mascotasAnimale,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_animales_delete', methods: ['POST'])]
    public function delete(Request $request, MascotasAnimales $mascotasAnimale, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mascotasAnimale->getId(), $request->request->get('_token'))) {
            $entityManager->remove($mascotasAnimale);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_animales_index', [], Response::HTTP_SEE_OTHER);
    }
}
