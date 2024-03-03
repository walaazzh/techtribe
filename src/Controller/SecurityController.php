<?php

namespace App\Controller;
<<<<<<< HEAD
<<<<<<< HEAD
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
=======

>>>>>>> chiheb+walaa/syrinecopie_branch
=======
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
>>>>>>> 6f2e479 (walaa+bundles)
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6f2e479 (walaa+bundles)
use App\Form\ResetPasswordRequestFormType;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;
use Symfony\Component\Mailer\MailerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Form\ResetPasswordFormType;
<<<<<<< HEAD
=======
>>>>>>> chiheb+walaa/syrinecopie_branch
=======
>>>>>>> 6f2e479 (walaa+bundles)

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6f2e479 (walaa+bundles)


    #[Route('/forgotten', name: 'forgotten_password')]
    public function forgottenPassword(
        Request $request,
        UserRepository $usersRepository,
        TokenGeneratorInterface $tokenGenerator,
        EntityManagerInterface $entityManager,
        MailerInterface $mailer
    ): Response
    {
        $form = $this->createForm(ResetPasswordRequestFormType::class);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $email = $form->get('email')->getData();
            $user = $usersRepository->findOneByEmail($form->get('email')->getData());
    
            if($user){
                $token = $tokenGenerator->generateToken();
                $user->setResetToken($token);
                $entityManager->persist($user);
                $entityManager->flush();
                
                $url = $this->generateUrl('reset_pass', ['token' => $token], UrlGeneratorInterface::ABSOLUTE_URL);


                $emailBody = "To reset your password, please visit the following link: $url";


                $context = compact('url', 'user');
                $email = (new TemplatedEmail())
<<<<<<< HEAD
<<<<<<< HEAD
                ->from('bloodifyesprit@gmail.com')
=======
                ->from('walaazhani6@gmail.com')
>>>>>>> 6f2e479 (walaa+bundles)
=======
                ->from('bloodifyesprit@gmail.com')
>>>>>>> 7caf93a (walaa+bundles+final)
                ->to($email)
                ->subject('Reset Password !')
                ->text($emailBody);

            $mailer->send($email);
    
                    $this->addFlash('success', 'Email sent successfully! Please check your email to reset your password.');
                    return $this->redirectToRoute('app_login');


            }
            $this->addFlash('danger', 'Un problème est survenu');
            return $this->redirectToRoute('app_login');
                
        }
    
        return $this->render('security/reset_password_request.html.twig', [
            'requestPassForm' => $form->createView()
        ]);
    }
    #[Route('/forgotten/{token}', name:'reset_pass')]
    public function resetPass(
        string $token,
        Request $request,
        UserRepository $usersRepository,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher
    ): Response
    {
        // On vérifie si on a ce token dans la base
        $user = $usersRepository->findOneByResetToken($token);
        
        if($user){
            $form = $this->createForm(ResetPasswordFormType::class);

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){
                // On efface le token
                $user->setResetToken('');
                $user->setPassword(
                    $passwordHasher->hashPassword(
                        $user,
                        $form->get('password')->getData()
                    )
                );
                $entityManager->persist($user);
                $entityManager->flush();

                $this->addFlash('success', 'Password updated succefully !');
                return $this->redirectToRoute('app_login');
            }

            return $this->render('security/reset_password.html.twig', [
                'passForm' => $form->createView()
            ]);
        }
        $this->addFlash('danger', 'Jeton invalide');
        return $this->redirectToRoute('app_login');
    }


}
// #[Route('/oubli-pass', name:'forgotten_password')]
//     public function forgottenPassword(
//         Request $request,
//         UsersRepository $usersRepository,
//         TokenGeneratorInterface $tokenGenerator,
//         EntityManagerInterface $entityManager,
//         SendMailService $mail
//     ): Response
//     {
//         $form = $this->createForm(ResetPasswordRequestFormType::class);

//         $form->handleRequest($request);

//         if($form->isSubmitted() && $form->isValid()){
//             //On va chercher l'utilisateur par son email
//             $user = $usersRepository->findOneByEmail($form->get('email')->getData());

//             // On vérifie si on a un utilisateur
//             if($user){
//                 // On génère un token de réinitialisation
//                 $token = $tokenGenerator->generateToken();
//                 $user->setResetToken($token);
//                 $entityManager->persist($user);
//                 $entityManager->flush();

//                 // On génère un lien de réinitialisation du mot de passe
//                 $url = $this->generateUrl('reset_pass', ['token' => $token], UrlGeneratorInterface::ABSOLUTE_URL);
                
//                 // On crée les données du mail
//                 $context = compact('url', 'user');

//                 // Envoi du mail
//                 $mail->send(
//                     'no-reply@e-commerce.fr',
//                     $user->getEmail(),
//                     'Réinitialisation de mot de passe',
//                     'password_reset',
//                     $context
//                 );

//                 $this->addFlash('success', 'Email sent successfully!');
//                 return $this->redirectToRoute('app_login');
//             }
//             // $user est null

//             $this->addFlash('danger', 'Un problème est survenu');
//             return $this->redirectToRoute('app_login');
//         }

//         return $this->render('security/reset_password_request.html.twig', [
//             'requestPassForm' => $form->createView()
//         ]);
//     }
<<<<<<< HEAD
=======
}
>>>>>>> chiheb+walaa/syrinecopie_branch
=======
>>>>>>> 6f2e479 (walaa+bundles)
