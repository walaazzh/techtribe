<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventType;
use App\Repository\EventRepository;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use App\Entity\Participation;
>>>>>>> chiheb+walaa/syrinecopie_branch
=======
>>>>>>> c98b2fa (walaa+chiheb integration)
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/event')]
class EventController extends AbstractController
{
    #[Route('/', name: 'app_event_index', methods: ['GET'])]
    public function index(EventRepository $eventRepository): Response
    {
        return $this->render('event/index.html.twig', [
            'events' => $eventRepository->findAll(),
        ]);
    }

<<<<<<< HEAD
<<<<<<< HEAD
    #[Route('/new', name: 'app_event_new', methods: ['GET', 'POST'])]
=======
   /* #[Route('/new', name: 'app_event_new', methods: ['GET', 'POST'])]
>>>>>>> chiheb+walaa/syrinecopie_branch
=======
    #[Route('/new', name: 'app_event_new', methods: ['GET', 'POST'])]
>>>>>>> c98b2fa (walaa+chiheb integration)
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $event = new Event();
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($event);
            $entityManager->flush();

            return $this->redirectToRoute('app_event_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('event/new.html.twig', [
            'event' => $event,
            'form' => $form,
        ]);
    }
<<<<<<< HEAD
<<<<<<< HEAD

=======
*/
#[Route('/new', name: 'app_event_new', methods: ['GET', 'POST'])]
public function new(Request $request, EntityManagerInterface $entityManager): Response
{
    $event = new Event();
    $form = $this->createForm(EventType::class, $event);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // Récupérez le fichier de l'image à partir du formulaire
        $imageFile = $form->get('imageFile')->getData();
        
        // Vérifiez s'il y a un fichier d'image
        if ($imageFile) {
            // Définissez le nom de l'image sur l'entité Event
            $event->setImageFile($imageFile);
            // Persistez l'entité Event
            $entityManager->persist($event);
            // Flush pour enregistrer l'entité dans la base de données
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_event_index', [], Response::HTTP_SEE_OTHER);
    }

    return $this->renderForm('event/new.html.twig', [
        'event' => $event,
        'form' => $form,
    ]);
}
>>>>>>> chiheb+walaa/syrinecopie_branch
=======

>>>>>>> c98b2fa (walaa+chiheb integration)
    #[Route('/{id}', name: 'app_event_show', methods: ['GET'])]
    public function show(Event $event): Response
    {
        return $this->render('event/show.html.twig', [
            'event' => $event,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_event_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Event $event, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_event_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('event/edit.html.twig', [
            'event' => $event,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_event_delete', methods: ['POST'])]
    public function delete(Request $request, Event $event, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$event->getId(), $request->request->get('_token'))) {
            $entityManager->remove($event);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_event_index', [], Response::HTTP_SEE_OTHER);
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======

    
    #[Route('/event/{id}/participate', name: 'event_participate')]
    public function participate(Event $event, EntityManagerInterface $entityManager): Response
{
    // Vérifiez si l'utilisateur est connecté
    $user = $this->getUser();
    if (!$user) {
        // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
        return $this->redirectToRoute('app_login');
    }
    // Vérifiez s'il y a des places disponibles

    $currentDate = new \DateTime();
    if ($event->getDateFin() < $currentDate) {
        $this->addFlash('warning', 'Sorry, the event has already ended.');
        return $this->redirectToRoute('event_details', ['id' => $event->getId()]);
    }
    if ($event->getMaxParticipant() <= 0) {
        $this->addFlash('warning', 'Sorry, no more places available for this event.');
        return $this->redirectToRoute('event_details', ['id' => $event->getId()]);
    }
    // Créer une nouvelle instance de Participation
    $participation = new Participation();
    $participation->setUser($user);
    $participation->setEvent($event);

    // Enregistrer la participation dans la base de données
    $entityManager->persist($participation);
    $entityManager->flush();

    // Décrémentez le nombre maximal de participants
     $event->setMaxParticipant($event->getMaxParticipant() - 1);
     $entityManager->flush();

    // Rediriger vers la page de l'événement avec un message de confirmation
    $this->addFlash('success', 'You have successfully participated in the event!');
    return $this->redirectToRoute('event_details', ['id' => $event->getId()]);
}





>>>>>>> chiheb+walaa/syrinecopie_branch
=======
>>>>>>> c98b2fa (walaa+chiheb integration)
}
