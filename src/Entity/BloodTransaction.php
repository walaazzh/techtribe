<?php

namespace App\Entity;
<<<<<<< HEAD

=======
use Symfony\Component\Validator\Constraints as Assert;
>>>>>>> 8b6d46d (Rayen)
use App\Repository\BloodTransactionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BloodTransactionRepository::class)]
class BloodTransaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
<<<<<<< HEAD
    private ?float $quantity_donated = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $donation_date = null;

    #[ORM\Column(length: 255)]
=======
    #[Assert\NotBlank(message: 'Please add the quantity')]
    #[Assert\GreaterThan(value:0,message:"The quantity must be a strictly positive number")]
    
    private ?float $quantity_donated = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotBlank(message: 'Please add the date')]
    #[Assert\GreaterThanOrEqual(value:"today",message:"The due date must be in the future")]
    private ?\DateTimeInterface $donation_date = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Please add the transaction type')]
    #[Assert\Length(min:4,max: 30,minMessage:'The transaction type must be at least 4 characters long ', maxMessage: 'The transaction type cannot exceed 30 characters')]
    #[Assert\Regex(pattern:'/^[a-zA-Z\-]+$/',message:"The transaction type must contain only letters and hyphens")]
>>>>>>> 8b6d46d (Rayen)
    private ?string $transaction_type = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantityDonated(): ?float
    {
        return $this->quantity_donated;
    }

    public function setQuantityDonated(float $quantity_donated): static
    {
        $this->quantity_donated = $quantity_donated;

        return $this;
    }

    public function getDonationDate(): ?\DateTimeInterface
    {
        return $this->donation_date;
    }

    public function setDonationDate(\DateTimeInterface $donation_date): static
    {
        $this->donation_date = $donation_date;

        return $this;
    }

    public function getTransactionType(): ?string
    {
        return $this->transaction_type;
    }

    public function setTransactionType(string $transaction_type): static
    {
        $this->transaction_type = $transaction_type;

        return $this;
    }
}
