<?php

namespace App\Entity;

use App\Repository\HospitalRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\BloodTransaction;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


#[ORM\Entity(repositoryClass: HospitalRepository::class)]
class Hospital
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $location = null;

    #[ORM\Column(length: 255)]
    private ?string $contact_number = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\Email(
        message: 'The email {{ value }} is not a valid email.',
    )]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $website = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\PasswordStrength]
    private ?string $password = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getContactNumber(): ?string
    {
        return $this->contact_number;
    }

    public function setContactNumber(string $contact_number): static
    {
        $this->contact_number = $contact_number;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(string $website): static
    {
        $this->website = $website;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }
    // ...

    #[ORM\OneToMany(targetEntity: BloodTransaction::class, mappedBy: 'hospital')]
    private $bloodTransactions;

    public function __construct()
    {
        $this->bloodTransactions = new ArrayCollection();
    }

    /**
     * @return Collection|BloodTransaction[]
     */
    public function getBloodTransactions(): Collection
    {
        return $this->bloodTransactions;
    }

    public function addBloodTransaction(BloodTransaction $bloodTransaction): self
    {
        if (!$this->bloodTransactions->contains($bloodTransaction)) {
            $this->bloodTransactions[] = $bloodTransaction;
            $bloodTransaction->setHospital($this);
        }

        return $this;
    }

    public function removeBloodTransaction(BloodTransaction $bloodTransaction): self
    {
        if ($this->bloodTransactions->removeElement($bloodTransaction)) {
            // set the owning side to null (unless already changed)
            if ($bloodTransaction->getHospital() === $this) {
                $bloodTransaction->setHospital(null);
            }
        }

        return $this;
    }
}

