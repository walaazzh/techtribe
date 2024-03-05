<?php

namespace App\Controller;

use App\Entity\BloodTransaction;
use App\Form\BloodTransactionType;
use App\Repository\BloodTransactionRepository;
use App\Repository\HospitalRepository; // Add this line
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\TransactionAvailabilityService; // Add this line

#[Route('/blood/transaction')]
class BloodTransactionController extends AbstractController
{
    private $hospitalRepository; // Declare hospitalRepository property
    private $transactionAvailabilityService; // Declare transactionAvailabilityService property

    // Inject HospitalRepository and TransactionAvailabilityService via constructor
    public function __construct(HospitalRepository $hospitalRepository, TransactionAvailabilityService $transactionAvailabilityService)
    {
        $this->hospitalRepository = $hospitalRepository;
        $this->transactionAvailabilityService = $transactionAvailabilityService;
    }

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
            // Check availability of the requested quantity
            $requestedQuantity = $bloodTransaction->getQuantityDonated();
            if (!$this->transactionAvailabilityService->checkAvailability($requestedQuantity)) {
                $this->addFlash('error', 'The requested quantity is not available in stock');
                return $this->redirectToRoute('app_blood_transaction_index');
            }

            // Set hospital for the blood transaction
            $user = $this->getUser();
            $hospital = $user->getHospital();
            $bloodTransaction->setHospital($hospital);

            // Persist and flush the blood transaction
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
}
