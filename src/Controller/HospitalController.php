<?php

namespace App\Controller;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
use App\Entity\Hospital;
use App\Form\HospitalType;
use App\Repository\HospitalRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/hospital')]
class HospitalController extends AbstractController
{
    #[Route('/', name: 'app_hospital_index', methods: ['GET'])]
    public function index(HospitalRepository $hospitalRepository): Response
    {
        return $this->render('hospital/index.html.twig', [
            'hospitals' => $hospitalRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_hospital_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $hospital = new Hospital();
        $form = $this->createForm(HospitalType::class, $hospital);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Create a new user account
            $user = new User();
            $user->setEmail($hospital->getEmail());
            $user->setRoles(['ROLE_HOSPITAL']);
            $user->setPassword($passwordEncoder->encodePassword($user, 'default_password')); // Replace 'default_password' with a secure default password
            // Set other user attributes as needed

            // Set user as related to the hospital
            $hospital->setUser($user);

            $entityManager->persist($hospital);
            $entityManager->flush();

            return $this->redirectToRoute('app_hospital_index');
        }

        return $this->renderForm('hospital/new.html.twig', [
            'hospital' => $hospital,
            'form' => $form,
        ]);
    }

    // Other actions (show, edit, delete) remain unchanged...
}
