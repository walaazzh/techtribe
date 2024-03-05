<?php 


namespace App\Service;

use App\Repository\BloodStockRepository;

class TransactionAvailabilityService
{
    private $bloodStockRepository;

    public function __construct(BloodStockRepository $bloodStockRepository)
    {
        $this->bloodStockRepository = $bloodStockRepository;
    }

    public function checkAvailability(int $requestedQuantity): bool
    {
        // Récupérer la quantité disponible dans le stock de sang
        $availableQuantity = $this->bloodStockRepository->findAvailableQuantity();

        // Vérifier si la quantité demandée est disponible dans le stock
        if ($requestedQuantity <= $availableQuantity) {
            return true;
        } else {
            return false;
        }
    }
}