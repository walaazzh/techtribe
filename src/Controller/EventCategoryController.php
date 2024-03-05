<?php

namespace App\Controller;

use App\Entity\EventCategory;
use App\Form\EventCategoryType;
use App\Repository\EventCategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
<<<<<<< HEAD
=======
use Knp\Component\Pager\PaginatorInterface;
>>>>>>> chiheb+walaa/syrinecopie_branch

#[Route('/event/category')]
class EventCategoryController extends AbstractController
{
    #[Route('/', name: 'app_event_category_index', methods: ['GET'])]
<<<<<<< HEAD
    public function index(EventCategoryRepository $eventCategoryRepository): Response
    {
        return $this->render('event_category/index.html.twig', [
            'event_categories' => $eventCategoryRepository->findAll(),
        ]);
    }
=======
    public function index(EventCategoryRepository $eventCategoryRepository,PaginatorInterface $paginator, Request $request): Response
    {
        $eventCategories = $eventCategoryRepository->findAll();
    
        $eventCategoriesPaginated = $paginator->paginate(
        $eventCategories,
        $request->query->getInt('page', 1), 
        5
    );

    return $this->render('event_category/index.html.twig', [
        'event_categories' => $eventCategoriesPaginated,
    ]);
    }
    /*
             return $this->render('event_category/index.html.twig', [
            'event_categories' => $eventCategoryRepository->findAll(),
        ]);
    */
>>>>>>> chiheb+walaa/syrinecopie_branch

    #[Route('/new', name: 'app_event_category_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $eventCategory = new EventCategory();
        $form = $this->createForm(EventCategoryType::class, $eventCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($eventCategory);
            $entityManager->flush();

            return $this->redirectToRoute('app_event_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('event_category/new.html.twig', [
            'event_category' => $eventCategory,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_event_category_show', methods: ['GET'])]
    public function show(EventCategory $eventCategory): Response
    {
        return $this->render('event_category/show.html.twig', [
            'event_category' => $eventCategory,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_event_category_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EventCategory $eventCategory, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EventCategoryType::class, $eventCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_event_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('event_category/edit.html.twig', [
            'event_category' => $eventCategory,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_event_category_delete', methods: ['POST'])]
    public function delete(Request $request, EventCategory $eventCategory, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$eventCategory->getId(), $request->request->get('_token'))) {
            $entityManager->remove($eventCategory);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_event_category_index', [], Response::HTTP_SEE_OTHER);
    }
}
