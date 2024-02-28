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
public function add(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
{
    $user = new User();
    $form = $this->createForm(UserType::class, $user);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // Encode the password using the password encoder
        $encodedPassword = $passwordEncoder->encodePassword($user, $user->getPassword());
        $user->setPassword($encodedPassword);

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
}
