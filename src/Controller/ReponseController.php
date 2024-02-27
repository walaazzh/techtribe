<?php

namespace App\Controller;
<<<<<<< HEAD

=======
>>>>>>> 23a1a9b (walaa new commit)
use App\Entity\Reclamation;
use App\Entity\Reponse;
use App\Form\ReponseType;
use App\Repository\ReponseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/reponse')]
class ReponseController extends AbstractController
{
    #[Route('/', name: 'app_reponse_index', methods: ['GET'])]
    public function index(ReponseRepository $reponseRepository): Response
    {
<<<<<<< HEAD
        // Fetch all responses from the database
        $reponses = $reponseRepository->findAll();

        // Render the responses in the index template
        return $this->render('reponse/index.html.twig', [
            'reponses' => $reponses,
=======
        return $this->render('reponse/index.html.twig', [
            'reponses' => $reponseRepository->findAll(),
>>>>>>> 23a1a9b (walaa new commit)
        ]);
    }

    #[Route('/{id}/new', name: 'app_reponse_new', methods: ['GET', 'POST'])]
<<<<<<< HEAD
    public function new(Request $request, EntityManagerInterface $entityManager, Reclamation $reclamation): Response
    {
        // Create a new response instance
        $reponse = new Reponse();

        // Update the state of the associated reclamation to "Waiting"
        $reclamation->setEtat("Waiting");
        $entityManager->flush();

        // Create a form for adding a new response
        $form = $this->createForm(ReponseType::class, $reponse);
        $form->handleRequest($request);

        // Handle form submission
        if ($form->isSubmitted() && $form->isValid()) {
            // Set the associated reclamation and user for the response
            $reponse->setIdRec($reclamation);
            $reponse->SetIdUser(1); // Assuming user ID 1 for demonstration purposes
            $reponse->setCreatedAt(new \DateTimeImmutable());

            // Persist the response
            $entityManager->persist($reponse);
            $entityManager->flush();

            // Update the state of the associated reclamation to "Done"
            $reclamation->setEtat("Done");
            $entityManager->flush();

            // Redirect to the reclamation index page
            return $this->redirectToRoute('app_reclamation_index');
        }

        // Render the form for adding a new response
        return $this->renderForm('reponse/new.html.twig', [
            'reclamation' => $reclamation,
=======
    public function new(Request $request, EntityManagerInterface $entityManager,Reclamation $reclamation): Response
    {

        $reponse = new Reponse();
        $reclamation->setEtat("Waiting");
        $entityManager->flush();
        $form = $this->createForm(ReponseType::class, $reponse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reponse->setIdRec($reclamation);
            $date= new \DateTimeImmutable();
            $reponse->setCreatedAt($date);
            $reponse->SetIdUser(1);
            
            $entityManager->persist($reponse);
            $entityManager->flush();
            $reclamation->setEtat("Done");
            $entityManager->flush();

            return $this->redirectToRoute('app_reclamation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reponse/new.html.twig', [
            'reclamation'=>$reclamation,
>>>>>>> 23a1a9b (walaa new commit)
            'reponse' => $reponse,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reponse_show', methods: ['GET'])]
    public function show(Reponse $reponse): Response
    {
<<<<<<< HEAD
        // Render the response details in the show template
=======
>>>>>>> 23a1a9b (walaa new commit)
        return $this->render('reponse/show.html.twig', [
            'reponse' => $reponse,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_reponse_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reponse $reponse, EntityManagerInterface $entityManager): Response
    {
<<<<<<< HEAD
        // Create a form for editing the response
        $form = $this->createForm(ReponseType::class, $reponse);
        $form->handleRequest($request);

        // Handle form submission
        if ($form->isSubmitted() && $form->isValid()) {
            // Update the response in the database
            $entityManager->flush();

            // Redirect to the response index page
            return $this->redirectToRoute('app_reponse_index');
        }

        // Render the form for editing the response
=======
        $form = $this->createForm(ReponseType::class, $reponse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_reponse_index', [], Response::HTTP_SEE_OTHER);
        }

>>>>>>> 23a1a9b (walaa new commit)
        return $this->renderForm('reponse/edit.html.twig', [
            'reponse' => $reponse,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reponse_delete', methods: ['POST'])]
    public function delete(Request $request, Reponse $reponse, EntityManagerInterface $entityManager): Response
    {
<<<<<<< HEAD
        // Check if the CSRF token is valid
        if ($this->isCsrfTokenValid('delete' . $reponse->getId(), $request->request->get('_token'))) {
            // Remove the response from the database
=======
        if ($this->isCsrfTokenValid('delete'.$reponse->getId(), $request->request->get('_token'))) {
>>>>>>> 23a1a9b (walaa new commit)
            $entityManager->remove($reponse);
            $entityManager->flush();
        }

<<<<<<< HEAD
        // Redirect to the response index page
        return $this->redirectToRoute('app_reponse_index');
=======
        return $this->redirectToRoute('app_reponse_index', [], Response::HTTP_SEE_OTHER);
>>>>>>> 23a1a9b (walaa new commit)
    }
}
