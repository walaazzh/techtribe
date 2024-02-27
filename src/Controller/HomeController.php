<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
}

