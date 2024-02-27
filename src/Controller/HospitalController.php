<?php

namespace App\Controller;

<<<<<<< HEAD
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
=======
>>>>>>> 23a1a9b (walaa new commit)
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
<<<<<<< HEAD
    public function new(Request $request, EntityManagerInterface $entityManager, UserPasswordEncoderInterface $passwordEncoder): Response
=======
    public function new(Request $request, EntityManagerInterface $entityManager): Response
>>>>>>> 23a1a9b (walaa new commit)
    {
        $hospital = new Hospital();
        $form = $this->createForm(HospitalType::class, $hospital);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
<<<<<<< HEAD
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
=======
            $entityManager->persist($hospital);
            $entityManager->flush();

            return $this->redirectToRoute('app_hospital_index', [], Response::HTTP_SEE_OTHER);
>>>>>>> 23a1a9b (walaa new commit)
        }

        return $this->renderForm('hospital/new.html.twig', [
            'hospital' => $hospital,
            'form' => $form,
        ]);
    }

<<<<<<< HEAD
    // Other actions (show, edit, delete) remain unchanged...
=======
    #[Route('/{id}', name: 'app_hospital_show', methods: ['GET'])]
    public function show(Hospital $hospital): Response
    {
        return $this->render('hospital/show.html.twig', [
            'hospital' => $hospital,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_hospital_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Hospital $hospital, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(HospitalType::class, $hospital);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_hospital_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('hospital/edit.html.twig', [
            'hospital' => $hospital,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_hospital_delete', methods: ['POST'])]
    public function delete(Request $request, Hospital $hospital, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$hospital->getId(), $request->request->get('_token'))) {
            $entityManager->remove($hospital);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_hospital_index', [], Response::HTTP_SEE_OTHER);
    }
>>>>>>> 23a1a9b (walaa new commit)
}
