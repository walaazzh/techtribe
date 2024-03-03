<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6f2e479 (walaa+bundles)
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Security\LoginFormAuthenticator;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\RegistrationFormType;
<<<<<<< HEAD
=======

>>>>>>> chiheb+walaa/syrinecopie_branch
=======
>>>>>>> 6f2e479 (walaa+bundles)

class UserController extends AbstractController
{
#[Route('/admin', name: 'user_index')]
public function index(UserRepository $userRepository): Response
{
    $users = $userRepository->findAll();
    return $this->render('user/index.html.twig', [
        'users' => $users,
    ]);
}
    
#[Route('/user/{id}', name: 'user_show')]
public function show(User $user): Response
{
    return $this->render('user/show.html.twig', [
        'user' => $user,
    ]);
}
#[Route('/user/{id}/edit', name: 'user_edit')]
public function edit(Request $request, User $user): Response
{
    $form = $this->createForm(UserType::class, $user);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('user_index');
    }

    return $this->render('user/edit.html.twig', [
        'user' => $user,
        'form' => $form->createView(),
    ]);
}
#[Route('/admin/add', name: 'user_add')]
<<<<<<< HEAD
<<<<<<< HEAD
public function add(Request $request,  UserPasswordHasherInterface  $passwordEncoder): Response
=======
public function add(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
>>>>>>> chiheb+walaa/syrinecopie_branch
=======
public function add(Request $request,  UserPasswordHasherInterface  $passwordEncoder): Response
>>>>>>> 6f2e479 (walaa+bundles)
{
    $user = new User();
    $form = $this->createForm(UserType::class, $user);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6f2e479 (walaa+bundles)
        // encode the plain password
        $user->setPassword(
            $passwordEncoder->hashPassword(
                $user,
                $form->get('password')->getData()
            )
        );
<<<<<<< HEAD
=======
        // Encode the password using the password encoder
        $encodedPassword = $passwordEncoder->encodePassword($user, $user->getPassword());
        $user->setPassword($encodedPassword);
>>>>>>> chiheb+walaa/syrinecopie_branch
=======
>>>>>>> 6f2e479 (walaa+bundles)

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();

        return $this->redirectToRoute('user_index');
    }

    return $this->render('user/addadmin.html.twig', [
        'form' => $form->createView(),
    ]);
}
#[Route('/admin/{id}', name: 'user_admin_show')]
public function adminShow(User $user): Response
{
    return $this->render('user/showadmin.html.twig', [
        'user' => $user,
    ]);
}

#[Route('/admin/user/{id}/edit', name: 'user_admin_edit')]
public function adminEdit(Request $request, User $user): Response
{
    $form = $this->createForm(UserType::class, $user);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('user_index');
    }

    return $this->render('user/editadmin.html.twig', [
        'user' => $user,
        'form' => $form->createView(),
    ]);
}
#[Route('/admin/user/{id}/delete', name: 'user_delete')]
    public function delete(User $user): RedirectResponse
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($user);
        $entityManager->flush();



        return $this->redirectToRoute('user_index');
}
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6f2e479 (walaa+bundles)
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, LoginFormAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('password')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

<<<<<<< HEAD
<<<<<<< HEAD
            return $this->redirectToRoute('app_login');
=======
            return $this->redirectToRoute('app_home');
>>>>>>> 6f2e479 (walaa+bundles)
=======
            return $this->redirectToRoute('app_login');
>>>>>>> 7caf93a (walaa+bundles+final)
        }

        return $this->render('registration/register.html.twig', [
            'userForm' => $form->createView(),
        ]);
    }

<<<<<<< HEAD
=======
>>>>>>> chiheb+walaa/syrinecopie_branch
=======
>>>>>>> 6f2e479 (walaa+bundles)
}
