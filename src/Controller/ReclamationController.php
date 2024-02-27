<?php

namespace App\Controller;

use App\Entity\Reclamation;
<<<<<<< HEAD
=======
use App\Entity\Reponse;
>>>>>>> 23a1a9b (walaa new commit)
use App\Form\ReclamationType;
use App\Repository\ReclamationRepository;
use App\Repository\ReponseRepository;
use Doctrine\ORM\EntityManagerInterface;
<<<<<<< HEAD
use Knp\Component\Pager\PaginatorInterface;
=======
>>>>>>> 23a1a9b (walaa new commit)
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
<<<<<<< HEAD
use Symfony\Component\Security\Core\Security;
=======
>>>>>>> 23a1a9b (walaa new commit)

#[Route('/reclamation')]
class ReclamationController extends AbstractController
{
<<<<<<< HEAD
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

=======
>>>>>>> 23a1a9b (walaa new commit)
    #[Route('/', name: 'app_reclamation_index', methods: ['GET'])]
    public function index(ReclamationRepository $reclamationRepository): Response
    {
        return $this->render('reclamation/index.html.twig', [
            'reclamations' => $reclamationRepository->findAll(),
        ]);
    }
<<<<<<< HEAD

    #[Route('/Front', name: 'app_reclamation_index_front', methods: ['GET'])]
    public function indexFront(ReclamationRepository $reclamationRepository): Response
    {
        $user = $this->security->getUser();
        if (!$user) {
            // Handle case when user is not authenticated
            // You can redirect to a login page or return an error response
        }

        return $this->render('reclamation/indexFront.html.twig', [
            'reclamations' => $reclamationRepository->findBy(['user' => $user]),
=======
    #[Route('/Front', name: 'app_reclamation_index_front', methods: ['GET'])]
    public function indexFront(ReclamationRepository $reclamationRepository): Response
    {
        return $this->render('reclamation/indexFront.html.twig', [
            'reclamations' => $reclamationRepository->findByIdUser(1),
>>>>>>> 23a1a9b (walaa new commit)
        ]);
    }

    #[Route('/new', name: 'app_reclamation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $reclamation = new Reclamation();
        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
<<<<<<< HEAD
            $user = $this->security->getUser();
            if (!$user) {
                // Handle case when user is not authenticated
                // You can redirect to a login page or return an error response
            }

            $reclamation->setUser($user);
            $reclamation->setCreatedAt(new \DateTimeImmutable());
            $reclamation->setEtat("Not Treated");

            $entityManager->persist($reclamation);
            $entityManager->flush();

            return $this->redirectToRoute('app_reclamation_index_front');
=======
            $reclamation->setEtat("Not Treated");
            $d=new \DateTimeImmutable();
            $reclamation->setCreatedAt($d);
            $reclamation->setIdUser(1);
            $entityManager->persist($reclamation);
            $entityManager->flush();

            return $this->redirectToRoute('app_reclamation_index_front', [], Response::HTTP_SEE_OTHER);
>>>>>>> 23a1a9b (walaa new commit)
        }

        return $this->renderForm('reclamation/new.html.twig', [
            'reclamation' => $reclamation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reclamation_show', methods: ['GET'])]
<<<<<<< HEAD
    public function show(Reclamation $reclamation, ReponseRepository $reprepo): Response
    {
        $reponse = $reprepo->findByRec($reclamation->getId());
        return $this->render('reclamation/show.html.twig', [
            'reclamation' => $reclamation,
            'reponse' => $reponse,
=======
    public function show(Reclamation $reclamation,ReponseRepository $reprepo): Response
    {
        $reponse = new Reponse();
        $reponse=$reprepo->findByRec($reclamation->getId());
        return $this->render('reclamation/show.html.twig', [
            'reclamation' => $reclamation,
            'reponse'=>$reponse,
>>>>>>> 23a1a9b (walaa new commit)
        ]);
    }

    #[Route('/{id}/edit', name: 'app_reclamation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reclamation $reclamation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

<<<<<<< HEAD
            return $this->redirectToRoute('app_reclamation_index_front');
=======
            return $this->redirectToRoute('app_reclamation_index_front', [], Response::HTTP_SEE_OTHER);
>>>>>>> 23a1a9b (walaa new commit)
        }

        return $this->renderForm('reclamation/edit.html.twig', [
            'reclamation' => $reclamation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reclamation_delete', methods: ['POST'])]
    public function delete(Request $request, Reclamation $reclamation, EntityManagerInterface $entityManager): Response
    {
<<<<<<< HEAD
        if ($this->isCsrfTokenValid('delete' . $reclamation->getId(), $request->request->get('_token'))) {
            $entityManager->remove($reclamation);
            $entityManager->flush();
        }
        return $this->redirectToRoute('app_reclamation_index_front');
    }
=======
        if ($this->isCsrfTokenValid('delete'.$reclamation->getId(), $request->request->get('_token'))) {
            $entityManager->remove($reclamation);
            $entityManager->flush();
        }
       $check=$request->request->get('front');
       if($check==1)
       {
        return $this->redirectToRoute('app_reclamation_index_front', [], Response::HTTP_SEE_OTHER);
       }
       else
        return $this->redirectToRoute('app_reclamation_index', [], Response::HTTP_SEE_OTHER);
    }
  
>>>>>>> 23a1a9b (walaa new commit)
}
