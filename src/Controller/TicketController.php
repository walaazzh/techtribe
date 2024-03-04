<?php

namespace App\Controller;

use App\Entity\Ticket;
use App\Form\TicketType;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use App\Entity\User;
use App\Entity\Event;
>>>>>>> chiheb+walaa/syrinecopie_branch
=======
>>>>>>> c98b2fa (walaa+chiheb integration)
=======
>>>>>>> 8b6d46d (Rayen)
use App\Repository\TicketRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Symfony\Component\Security\Core\Security;
use Dompdf\Dompdf;
use Dompdf\Options;
>>>>>>> chiheb+walaa/syrinecopie_branch
=======
>>>>>>> c98b2fa (walaa+chiheb integration)
=======
>>>>>>> 8b6d46d (Rayen)

#[Route('/ticket')]
class TicketController extends AbstractController
{
    #[Route('/', name: 'app_ticket_index', methods: ['GET'])]
    public function index(TicketRepository $ticketRepository): Response
    {
        return $this->render('ticket/index.html.twig', [
            'tickets' => $ticketRepository->findAll(),
        ]);
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    #[Route('/new', name: 'app_ticket_new', methods: ['GET', 'POST'])]
=======
   /* #[Route('/new', name: 'app_ticket_new', methods: ['GET', 'POST'])]
>>>>>>> chiheb+walaa/syrinecopie_branch
=======
    #[Route('/new', name: 'app_ticket_new', methods: ['GET', 'POST'])]
>>>>>>> c98b2fa (walaa+chiheb integration)
=======
    #[Route('/new', name: 'app_ticket_new', methods: ['GET', 'POST'])]
>>>>>>> 8b6d46d (Rayen)
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ticket = new Ticket();
        $form = $this->createForm(TicketType::class, $ticket);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ticket);
            $entityManager->flush();

            return $this->redirectToRoute('app_ticket_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ticket/new.html.twig', [
            'ticket' => $ticket,
            'form' => $form,
        ]);
    }
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
    */

    
>>>>>>> chiheb+walaa/syrinecopie_branch
=======
>>>>>>> c98b2fa (walaa+chiheb integration)
=======
>>>>>>> 8b6d46d (Rayen)

    #[Route('/{id}', name: 'app_ticket_show', methods: ['GET'])]
    public function show(Ticket $ticket): Response
    {
        return $this->render('ticket/show.html.twig', [
            'ticket' => $ticket,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ticket_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Ticket $ticket, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TicketType::class, $ticket);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ticket_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ticket/edit.html.twig', [
            'ticket' => $ticket,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ticket_delete', methods: ['POST'])]
    public function delete(Request $request, Ticket $ticket, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ticket->getId(), $request->request->get('_token'))) {
            $entityManager->remove($ticket);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ticket_index', [], Response::HTTP_SEE_OTHER);
    }
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
    #[Route('/ticket/{id}/pdf', name: 'print_ticket')]
public function printTicket(Ticket $ticket): Response
{
    // Créer une instance de Dompdf
    $dompdf = new Dompdf();

    // Options de configuration (optionnelles)
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isPhpEnabled', true);

    $dompdf->setOptions($options);

    // Générer le contenu HTML du ticket
    $html = $this->renderView('ticket/pdf.html.twig', ['ticket' => $ticket]);

    // Charger le HTML dans Dompdf
    $dompdf->loadHtml($html);

    // Rendre le document PDF
    $dompdf->render();

    // Générer une réponse avec le contenu PDF
    $response = new Response($dompdf->output());
    $response->headers->set('Content-Type', 'application/pdf');

    // Télécharger le fichier PDF au lieu de l'afficher dans le navigateur (facultatif)
    // $response->headers->set('Content-Disposition', 'inline; filename="ticket.pdf"');

    return $response;
}

#[Route('/new/{eventId}', name: 'app_ticket_new', methods: ['GET', 'POST'])]
public function new(Request $request, EntityManagerInterface $entityManager, Security $security, $eventId): Response
{
    // Assuming $eventId contains the ID of the event
    $event = $entityManager->getRepository(Event::class)->find($eventId);
    
    if (!$event) {
        throw $this->createNotFoundException('Event not found');
    }

    $ticket = new Ticket();
    $ticket->setEvent($event); // Set the event to the ticket

    $form = $this->createForm(TicketType::class, $ticket);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $user = $security->getUser();
        $ticket->setUser($user); // Assuming your Ticket entity has a relationship with User
        
        $entityManager->persist($ticket);
        $entityManager->flush();

        return $this->redirectToRoute('app_ticket_index', [], Response::HTTP_SEE_OTHER);
    }

    return $this->renderForm('ticket/new.html.twig', [
        'ticket' => $ticket,
        'form' => $form,
        'event' => $event, // Pass the event to the template
    ]);
}


#[Route('/my_tickets', name: 'app_my_tickets')]
public function myTickets(TicketRepository $ticketRepository, Security $security): Response
{
    $user = $security->getUser();
    $tickets = $ticketRepository->findBy(['user' => $user]);

    return $this->render('ticket/my_tickets.html.twig', [
        'tickets' => $tickets,
    ]);
}

>>>>>>> chiheb+walaa/syrinecopie_branch
=======
>>>>>>> c98b2fa (walaa+chiheb integration)
=======
>>>>>>> 8b6d46d (Rayen)
}
