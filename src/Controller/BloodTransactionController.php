<?php

namespace App\Controller;

use App\Entity\BloodTransaction;
use App\Form\BloodTransactionType;
use App\Repository\BloodTransactionRepository;
use App\Repository\HospitalRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/blood/transaction')]
class BloodTransactionController extends AbstractController
{
    #[Route('/', name: 'app_blood_transaction_index', methods: ['GET'])]
    public function index(BloodTransactionRepository $bloodTransactionRepository): Response
    {
        return $this->render('blood_transaction/index.html.twig', [
            'blood_transactions' => $bloodTransactionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_blood_transaction_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $bloodTransaction = new BloodTransaction();
        $form = $this->createForm(BloodTransactionType::class, $bloodTransaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($bloodTransaction);
            $entityManager->flush();

            return $this->redirectToRoute('app_blood_transaction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('blood_transaction/new.html.twig', [
            'blood_transaction' => $bloodTransaction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_blood_transaction_show', methods: ['GET'])]
    public function show(BloodTransaction $bloodTransaction): Response
    {
        return $this->render('blood_transaction/show.html.twig', [
            'blood_transaction' => $bloodTransaction,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_blood_transaction_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, BloodTransaction $bloodTransaction, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(BloodTransactionType::class, $bloodTransaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_blood_transaction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('blood_transaction/edit.html.twig', [
            'blood_transaction' => $bloodTransaction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_blood_transaction_delete', methods: ['POST'])]
    public function delete(Request $request, BloodTransaction $bloodTransaction, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bloodTransaction->getId(), $request->request->get('_token'))) {
            $entityManager->remove($bloodTransaction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_blood_transaction_index', [], Response::HTTP_SEE_OTHER);
    }
    public function __construct(private HospitalRepository $hospitalRepository) {}
}
