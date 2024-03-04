<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\EventCategory;
use App\Entity\Event;
>>>>>>> chiheb+walaa/syrinecopie_branch
=======
>>>>>>> c98b2fa (walaa+chiheb integration)
=======
>>>>>>> 8b6d46d (Rayen)

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/affiche', name: 'app_affiche')]
    public function affiche(){
        return new Response("walaaa");
    }
    #[Route('/home_admin', name: 'app_homeadmin')]
    public function hommeadmin(): Response
    {
        return $this->render('home/home_admin.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/about', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('home/about.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/canyoudonate', name: 'app_canyoudonate')]
    public function canyoudonate(): Response
    {
        return $this->render('home/canyoudonate.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/whydonate', name: 'app_whydonate')]
    public function whydonate(): Response
    {
        return $this->render('home/whydonate.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6f2e479 (walaa+bundles)
=======
>>>>>>> c98b2fa (walaa+chiheb integration)
=======
>>>>>>> 8b6d46d (Rayen)
    #[Route('/userbook', name: 'userbook')]
    public function rendezvous(): Response
    {
        return $this->render('home/book.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
    #[Route('/events', name: 'app_events')]
    public function events(ManagerRegistry $registry): Response
    {
        // Fetch all event categories from the database
        $eventCategories = $registry->getRepository(EventCategory::class)->findAll();
    
        return $this->render('home/events.html.twig', [
            'eventCategories' => $eventCategories,
        ]);
    }
   

    #[Route('/eventdetails/{id}', name: 'event_details')]
    public function eventDetails(Event $event): Response
    {
        return $this->render('home/event_details.html.twig', [
            'event' => $event,
        ]);
    }

>>>>>>> chiheb+walaa/syrinecopie_branch
=======
>>>>>>> 6f2e479 (walaa+bundles)
=======
>>>>>>> c98b2fa (walaa+chiheb integration)
=======
>>>>>>> 8b6d46d (Rayen)
}

