<?php

namespace App\Entity;

use App\Repository\AnswerRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: AnswerRepository::class)]
#[ORM\Table(name: 'answer')]
class Answer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Reclamation::class, inversedBy: 'answers')]
    #[ORM\JoinColumn(name: 'id_reclamation', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    #[Assert\NotNull(message: "La réclamation est requise.")]
    private ?Reclamation $reclamation = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'id_admin', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    #[Assert\NotNull(message: "L'administrateur est requis.")]
    private ?User $admin = null;

    #[ORM\Column(type: 'text')]
    #[Assert\NotBlank(message: "Le message de réponse est requis.")]
    private ?string $message = null;

    public function getId(): ?int { return $this->id; }

    public function getReclamation(): ?Reclamation { return $this->reclamation; }
    public function setReclamation(?Reclamation $reclamation): self { $this->reclamation = $reclamation; return $this; }

    public function getAdmin(): ?User { return $this->admin; }
    public function setAdmin(?User $admin): self { $this->admin = $admin; return $this; }

    public function getMessage(): ?string { return $this->message; }
    public function setMessage(string $message): self { $this->message = $message; return $this; }
}
