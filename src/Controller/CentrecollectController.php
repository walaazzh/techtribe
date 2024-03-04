<?php

namespace App\Controller;

use App\Entity\Centredecollect;
use App\Form\CentredecollectType;
use App\Repository\CentredecollectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/centrecollect')]
class CentrecollectController extends AbstractController
{
    #[Route('/', name: 'app_centrecollect_index', methods: ['GET'])]
    public function index(CentredecollectRepository $centredecollectRepository): Response
    {
        return $this->render('centrecollect/index.html.twig', [
            'centredecollects' => $centredecollectRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_centrecollect_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $centredecollect = new Centredecollect();
        $form = $this->createForm(CentredecollectType::class, $centredecollect);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($centredecollect);
            $entityManager->flush();

            return $this->redirectToRoute('app_centrecollect_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('centrecollect/new.html.twig', [
            'centredecollect' => $centredecollect,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_centrecollect_show', methods: ['GET'])]
    public function show(Centredecollect $centredecollect): Response
    {
        return $this->render('centrecollect/show.html.twig', [
            'centredecollect' => $centredecollect,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_centrecollect_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Centredecollect $centredecollect, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CentredecollectType::class, $centredecollect);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_centrecollect_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('centrecollect/edit.html.twig', [
            'centredecollect' => $centredecollect,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_centrecollect_delete', methods: ['POST'])]
    public function delete(Request $request, Centredecollect $centredecollect, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$centredecollect->getId(), $request->request->get('_token'))) {
            $entityManager->remove($centredecollect);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_centrecollect_index', [], Response::HTTP_SEE_OTHER);
    }
}
