<?php

namespace App\Controller;

use App\Entity\BloodStock;
use App\Form\BloodStockType;
use App\Repository\BloodStockRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/blood/stock')]
class BloodStockController extends AbstractController
{
    #[Route('/', name: 'app_blood_stock_index', methods: ['GET'])]
    public function index(BloodStockRepository $bloodStockRepository): Response
    {
        return $this->render('blood_stock/index.html.twig', [
            'blood_stocks' => $bloodStockRepository->findAll(),
        ]);
    }

<<<<<<< HEAD
    #[Route('/new', name: 'app_blood_stock_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $bloodStock = new BloodStock();
        $form = $this->createForm(BloodStockType::class, $bloodStock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($bloodStock);
            $entityManager->flush();

            return $this->redirectToRoute('app_blood_stock_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('blood_stock/new.html.twig', [
            'blood_stock' => $bloodStock,
=======
    #[Route('/new', name: 'app_blood_transaction_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Retrieve the authenticated user
        $user = $this->getUser();
        
        // Get the hospital associated with the user
        $hospital = $user->getHospital();

        $bloodTransaction = new BloodTransaction();
        
        // Set the hospital in the BloodTransaction entity
        $bloodTransaction->setHospital($hospital);

        $form = $this->createForm(BloodTransactionType::class, $bloodTransaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($bloodTransaction);
            $entityManager->flush();

            return $this->redirectToRoute('app_blood_transaction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('blood_transaction/new.html.twig', [
            'blood_transaction' => $bloodTransaction,
>>>>>>> Rayen_Majdoub
            'form' => $form,
        ]);
    }

<<<<<<< HEAD
=======

>>>>>>> Rayen_Majdoub
    #[Route('/{id}', name: 'app_blood_stock_show', methods: ['GET'])]
    public function show(BloodStock $bloodStock): Response
    {
        return $this->render('blood_stock/show.html.twig', [
            'blood_stock' => $bloodStock,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_blood_stock_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, BloodStock $bloodStock, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(BloodStockType::class, $bloodStock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_blood_stock_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('blood_stock/edit.html.twig', [
            'blood_stock' => $bloodStock,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_blood_stock_delete', methods: ['POST'])]
    public function delete(Request $request, BloodStock $bloodStock, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bloodStock->getId(), $request->request->get('_token'))) {
            $entityManager->remove($bloodStock);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_blood_stock_index', [], Response::HTTP_SEE_OTHER);
    }
}
