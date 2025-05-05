<?php

namespace App\Entity;

use App\Repository\ReclamationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\AnswerRepository;



#[ORM\Entity(repositoryClass: ReclamationRepository::class)]
#[ORM\Table(name: 'reclamation')]
class Reclamation
{
    const STATUS_PENDING = 'En attente';
    const STATUS_RESOLVED = 'Résolu';
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'id_player', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    #[Assert\NotNull(message: "Le joueur est requis.")]
    private ?User $user = null;

    #[ORM\Column(type: 'text')]
    #[Assert\NotBlank(message: "Le message est obligatoire.")]
    private ?string $message = null;

    #[ORM\Column(type: 'datetime')]
    #[Assert\Type(\DateTimeInterface::class)]
    private ?\DateTimeInterface $created_at = null;
    
    #[ORM\Column(type: 'string', length: 20)]
    private string $status = self::STATUS_PENDING;

    #[ORM\OneToMany(mappedBy: 'reclamation', targetEntity: Answer::class, orphanRemoval: true)]
    private Collection $answers;

    public function __construct()
    {
        $this->answers = new ArrayCollection();
    }

    public function getId(): ?int { return $this->id; }

    public function getUser(): ?User { return $this->user; }
    public function setUser(?User $user): self { $this->user = $user; return $this; }

    public function getMessage(): ?string { return $this->message; }
    public function setMessage(string $message): self { $this->message = $message; return $this; }

    public function getCreatedAt(): ?\DateTimeInterface { return $this->created_at; }
    public function setCreatedAt(\DateTimeInterface $created_at): self { $this->created_at = $created_at; return $this; }
    
    public function getStatus(): string { return $this->status; }
    public function setStatus(string $status): self { $this->status = $status; return $this; }
    
    /**
     * Retourne la liste des statuts possibles pour une réclamation
     *
     * @return array
     */
    public static function getStatusChoices(): array
    {
        return [
            self::STATUS_PENDING => self::STATUS_PENDING,
            self::STATUS_RESOLVED => self::STATUS_RESOLVED,
        ];
    }
    
    /**
     * Retourne la couleur associée au statut
     *
     * @return string
     */
    public function getStatusColor(): string
    {
        return match($this->status) {
            self::STATUS_RESOLVED => 'success',
            self::STATUS_PENDING => 'warning',
            default => 'info',
        };
    }

    /** @return Collection<int, Answer> */
    public function getAnswers(): Collection { return $this->answers; }

    public function addAnswer(Answer $answer): self
    {
        if (!$this->answers->contains($answer)) {
            $this->answers[] = $answer;
            $answer->setReclamation($this);
            
            // Passer automatiquement le statut à "Résolu" lorsqu'une réponse est ajoutée
            $this->status = self::STATUS_RESOLVED;
        }
        return $this;
    }

    public function removeAnswer(Answer $answer): self
    {
        if ($this->answers->removeElement($answer)) {
            if ($answer->getReclamation() === $this) {
                $answer->setReclamation(null);
            }
            
            // Si plus de réponses, revenir à "En attente"
            if ($this->answers->isEmpty()) {
                $this->status = self::STATUS_PENDING;
            }
        }
        return $this;
    }

    /**
     * Vérifie si le message a été filtré (contient des astérisques)
     *
     * @return bool
     */
    public function hasFilteredContent(): bool
    {
        if (null === $this->message) {
            return false;
        }
        
        // Un message est considéré comme filtré s'il contient des séquences d'astérisques
        // (au moins 3 astérisques consécutifs)
        return preg_match('/\*{3,}/', $this->message) === 1;
    }
    
    /**
     * Retourne le nombre de mots censurés dans le message
     *
     * @return int
     */
    public function getFilteredWordsCount(): int
    {
        if (null === $this->message) {
            return 0;
        }
        
        // Compte les séquences d'astérisques (qui représentent des mots censurés)
        preg_match_all('/\*{3,}/', $this->message, $matches);
        
        return count($matches[0]);
    }
}
