<?php

namespace App\Controller;

use App\Entity\Reclamation;
use App\Entity\Reponse;
use App\Form\ReponseType;
use App\Repository\ReponseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Repository\RatingRepository;
use App\Entity\Rating;
=======
>>>>>>> chiheb+walaa/syrinecopie_branch
=======
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Repository\RatingRepository;
use App\Entity\Rating;
>>>>>>> c98b2fa (walaa+chiheb integration)
=======
>>>>>>> 8b6d46d (Rayen)
=======
>>>>>>> 175bd6f (changes)

#[Route('/reponse')]
class ReponseController extends AbstractController
{
    #[Route('/', name: 'app_reponse_index', methods: ['GET'])]
    public function index(ReponseRepository $reponseRepository): Response
    {
        // Fetch all responses from the database
        $reponses = $reponseRepository->findAll();

        // Render the responses in the index template
        return $this->render('reponse/index.html.twig', [
            'reponses' => $reponses,
        ]);
    }

    #[Route('/{id}/new', name: 'app_reponse_new', methods: ['GET', 'POST'])]
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            'id'=>$reclamation,
=======
>>>>>>> chiheb+walaa/syrinecopie_branch
=======
            'id'=>$reclamation,
>>>>>>> c98b2fa (walaa+chiheb integration)
=======
>>>>>>> 8b6d46d (Rayen)
            'reclamation'=>$reclamation,
=======
            'reclamation' => $reclamation,
>>>>>>> 175bd6f (changes)
            'reponse' => $reponse,
            'form' => $form,
        ]);
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> c98b2fa (walaa+chiheb integration)
    #[Route('/{id}', name: 'app_reponse_show', methods: ['GET','POST'])]
    public function show(Reponse $reponse,RatingRepository $ratingrepo,Request $request): Response
    {
        
       
        $check=0;
      
       
        $rating = new Rating();
    $form = $this->createFormBuilder($rating)
        ->add('note', ChoiceType::class, [
            'label' => 'Rating',
            'choices' => [
                '1 star' => 1,
                '2 stars' => 2,
                '3 stars' => 3,
                '4 stars' => 4,
                '5 stars' => 5,
            ],
            'expanded' => true,
            'multiple' => false,
        ])
        ->getForm();
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
        // Save the rating
        $rating->setUser($this->getUser()->getId());
        $rating->setIdAdmin($this->getUser()->getId());
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($rating);
        $entityManager->flush();

        // Redirect to the same page to prevent form resubmission
        return $this->redirectToRoute('app_reponse_show', ['id' => $reponse->getId()]);
    }
    if($reponse){
        $check=1;
    $ratings = $ratingrepo->createQueryBuilder('r')
        ->select('AVG(r.note) as average_rating')
        ->andWhere('r.idAdmin = :id')
        ->setParameter('id', $reponse->getIdUser())
        ->getQuery()
        ->getSingleScalarResult();
    $averageRating =round($ratings, 1);
    return $this->render('reponse/show.html.twig', [
        'id' => $reponse->getId(),
        'reponse'=>$reponse,
        'check'=>$check,
        
        'average_rating' => $averageRating,
        'rating_form' => $form->createView(),
    ]);
    }
        return $this->render('reponse/show.html.twig', [
            'id' => $reponse->getId(),
            'reponse' => $reponse,
            
            'rating_form' => $form->createView(),
<<<<<<< HEAD
=======
=======
>>>>>>> 8b6d46d (Rayen)
    #[Route('/{id}', name: 'app_reponse_show', methods: ['GET'])]
    public function show(Reponse $reponse): Response
    {
        return $this->render('reponse/show.html.twig', [
            'reponse' => $reponse,
<<<<<<< HEAD
>>>>>>> chiheb+walaa/syrinecopie_branch
=======
>>>>>>> c98b2fa (walaa+chiheb integration)
=======
>>>>>>> 8b6d46d (Rayen)
=======
    #[Route('/{id}', name: 'app_reponse_show', methods: ['GET'])]
    public function show(Reponse $reponse): Response
    {
        // Render the response details in the show template
        return $this->render('reponse/show.html.twig', [
            'reponse' => $reponse,
>>>>>>> 175bd6f (changes)
        ]);
    }

    #[Route('/{id}/edit', name: 'app_reponse_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reponse $reponse, EntityManagerInterface $entityManager): Response
    {
        // Create a form for editing the response
        $form = $this->createForm(ReponseType::class, $reponse);
        $form->handleRequest($request);
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> c98b2fa (walaa+chiheb integration)
        $reclamation=$reponse->getIdRec();
        $date=$reponse->getCreatedAt();
       

        if ($form->isSubmitted() && $form->isValid()) {
            $reponse->setIdRec($reclamation);
          
            $reponse->setCreatedAt($date);
            $reponse->SetIdUser(1);
            $entityManager->flush();

            return $this->redirectToRoute('app_reclamation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reponse/edit.html.twig', [
            'id'=>$reclamation->getId(),
            'reclamation'=>$reclamation,
<<<<<<< HEAD
=======
=======
>>>>>>> 8b6d46d (Rayen)

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_reponse_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reponse/edit.html.twig', [
<<<<<<< HEAD
>>>>>>> chiheb+walaa/syrinecopie_branch
=======
>>>>>>> c98b2fa (walaa+chiheb integration)
=======
>>>>>>> 8b6d46d (Rayen)
=======

        // Handle form submission
        if ($form->isSubmitted() && $form->isValid()) {
            // Update the response in the database
            $entityManager->flush();

            // Redirect to the response index page
            return $this->redirectToRoute('app_reponse_index');
        }

        // Render the form for editing the response
        return $this->renderForm('reponse/edit.html.twig', [
>>>>>>> 175bd6f (changes)
            'reponse' => $reponse,
            'form' => $form,
        ]);
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    #[Route('/Delete/{id}', name: 'app_reponse_delete', methods: ['POST'])]
=======
    #[Route('/{id}', name: 'app_reponse_delete', methods: ['POST'])]
>>>>>>> chiheb+walaa/syrinecopie_branch
=======
    #[Route('/Delete/{id}', name: 'app_reponse_delete', methods: ['POST'])]
>>>>>>> c98b2fa (walaa+chiheb integration)
=======
    #[Route('/{id}', name: 'app_reponse_delete', methods: ['POST'])]
>>>>>>> 8b6d46d (Rayen)
=======
    #[Route('/{id}', name: 'app_reponse_delete', methods: ['POST'])]
>>>>>>> 175bd6f (changes)
    public function delete(Request $request, Reponse $reponse, EntityManagerInterface $entityManager): Response
    {
        // Check if the CSRF token is valid
        if ($this->isCsrfTokenValid('delete' . $reponse->getId(), $request->request->get('_token'))) {
            // Remove the response from the database
            $entityManager->remove($reponse);
            $entityManager->flush();
        }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->redirectToRoute('app_reclamation_index', [], Response::HTTP_SEE_OTHER);
=======
        return $this->redirectToRoute('app_reponse_index', [], Response::HTTP_SEE_OTHER);
>>>>>>> chiheb+walaa/syrinecopie_branch
=======
        return $this->redirectToRoute('app_reclamation_index', [], Response::HTTP_SEE_OTHER);
>>>>>>> c98b2fa (walaa+chiheb integration)
=======
        return $this->redirectToRoute('app_reponse_index', [], Response::HTTP_SEE_OTHER);
>>>>>>> 8b6d46d (Rayen)
=======
        // Redirect to the response index page
        return $this->redirectToRoute('app_reponse_index');
>>>>>>> 175bd6f (changes)
    }
}
