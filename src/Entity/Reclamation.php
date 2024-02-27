<?php

namespace App\Entity;

use App\Repository\ReclamationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ReclamationRepository::class)]
class Reclamation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
<<<<<<< HEAD
    #[Assert\NotBlank(message: "This field should not be blank.")]
    #[Assert\Length(
        min: 7,
        minMessage: "The field should be at least {{ limit }} characters long."
    )]
    #[Assert\Regex(
        pattern: "/^[a-zA-Z]+$/",
        message: "Only letters are allowed in this field."
    )]
    private ?string $titre = null;

    #[ORM\Column(length: 500)]
    #[Assert\NotBlank(message: "This field should not be blank.")]
=======
    #[Assert\NotBlank(message : "This field should not be blank.")]
    #[Assert\Length(
       min : 7,
       minMessage : "The field should be at least {{ limit }} characters long."
  )]
  #[Assert\Regex(
       pattern : "/^[a-zA-Z]+$/",
       message : "Only letters are allowed in this field."
  )]
    private ?string $titre = null;

    #[ORM\Column(length: 500)]
>>>>>>> 23a1a9b (walaa new commit)
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $etat = null;

<<<<<<< HEAD
    #[ORM\Column(type: 'datetime_immutable')]
=======
    #[ORM\Column]
>>>>>>> 23a1a9b (walaa new commit)
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\OneToOne(mappedBy: 'id_rec', cascade: ['persist', 'remove'])]
    private ?Reponse $reponse = null;

    #[ORM\Column]
    private ?int $id_user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

<<<<<<< HEAD
    public function setTitre(string $titre): self
=======
    public function setTitre(string $titre): static
>>>>>>> 23a1a9b (walaa new commit)
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

<<<<<<< HEAD
    public function setDescription(string $description): self
=======
    public function setDescription(string $description): static
>>>>>>> 23a1a9b (walaa new commit)
    {
        $this->description = $description;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

<<<<<<< HEAD
    public function setType(string $type): self
=======
    public function setType(string $type): static
>>>>>>> 23a1a9b (walaa new commit)
    {
        $this->type = $type;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

<<<<<<< HEAD
    public function setEtat(string $etat): self
=======
    public function setEtat(string $etat): static
>>>>>>> 23a1a9b (walaa new commit)
    {
        $this->etat = $etat;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

<<<<<<< HEAD
    public function setCreatedAt(\DateTimeImmutable $createdAt): self
=======
    public function setCreatedAt(\DateTimeImmutable $createdAt): static
>>>>>>> 23a1a9b (walaa new commit)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getReponse(): ?Reponse
    {
        return $this->reponse;
    }

<<<<<<< HEAD
    public function setReponse(Reponse $reponse): self
=======
    public function setReponse(Reponse $reponse): static
>>>>>>> 23a1a9b (walaa new commit)
    {
        // set the owning side of the relation if necessary
        if ($reponse->getIdRec() !== $this) {
            $reponse->setIdRec($this);
        }

        $this->reponse = $reponse;

        return $this;
    }

    public function getIdUser(): ?int
    {
        return $this->id_user;
    }

<<<<<<< HEAD
    public function setIdUser(int $id_user): self
=======
    public function setIdUser(int $id_user): static
>>>>>>> 23a1a9b (walaa new commit)
    {
        $this->id_user = $id_user;

        return $this;
    }
}
