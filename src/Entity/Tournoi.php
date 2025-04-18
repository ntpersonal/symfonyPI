<?php
// src/Entity/Tournoi.php

namespace App\Entity;

use App\Repository\TournoiRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\User;
use App\Entity\Matches;
use App\Entity\Ranking;
use App\Entity\Team;

#[ORM\Entity(repositoryClass: TournoiRepository::class)]
#[ORM\Table(name: 'tournoi')]
class Tournoi
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(name: "nom", type: Types::STRING)]
    private ?string $nom = null;

    #[ORM\Column(name: "sportType", type: Types::STRING, nullable: true)]
    private ?string $sportType = null;

    #[ORM\Column(name: "format", type: Types::STRING, nullable: true)]
    private ?string $format = null;

    #[ORM\Column(name: "status", type: Types::STRING, nullable: true)]
    private ?string $status = null;

    #[ORM\Column(name: "start_date", type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $start_date = null;

    #[ORM\Column(name: "end_date", type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $end_date = null;

    #[ORM\Column(name: "nbEquipe", type: Types::INTEGER)]
    private ?int $nbEquipe = null;

    #[ORM\Column(name: "tournoiLocation", type: Types::STRING, nullable: true)]
    private ?string $tournoiLocation = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'tournois')]
    #[ORM\JoinColumn(name: 'id_organizer', referencedColumnName: 'id', nullable: false)]
    private ?User $user = null;

    #[ORM\Column(name: "reglements", type: Types::STRING, nullable: true)]
    private ?string $reglements = null;

    /**
     * @var Collection<int, Matches>
     */
    #[ORM\OneToMany(
        mappedBy: 'tournoi',
        targetEntity: Matches::class,
        cascade: ['remove'],
        orphanRemoval: true
    )]
    private Collection $matches;

    /**
     * @var Collection<int, Ranking>
     */
    #[ORM\OneToMany(mappedBy: 'tournoi', targetEntity: Ranking::class)]
    private Collection $rankings;

    /**
     * @var Collection<int, Team>
     */
    #[ORM\OneToMany(mappedBy: 'tournoi', targetEntity: Team::class)]
    private Collection $teams;

    public function __construct()
    {
        $this->matches  = new ArrayCollection();
        $this->rankings = new ArrayCollection();
        $this->teams    = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getSportType(): ?string
    {
        return $this->sportType;
    }

    public function setSportType(?string $sportType): self
    {
        $this->sportType = $sportType;
        return $this;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function setFormat(?string $format): self
    {
        $this->format = $format;
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(\DateTimeInterface $start_date): self
    {
        $this->start_date = $start_date;
        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEndDate(\DateTimeInterface $end_date): self
    {
        $this->end_date = $end_date;
        return $this;
    }

    public function getNbEquipe(): ?int
    {
        return $this->nbEquipe;
    }

    public function setNbEquipe(int $nbEquipe): self
    {
        $this->nbEquipe = $nbEquipe;
        return $this;
    }

    public function getTournoiLocation(): ?string
    {
        return $this->tournoiLocation;
    }

    public function setTournoiLocation(?string $tournoiLocation): self
    {
        $this->tournoiLocation = $tournoiLocation;
        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getReglements(): ?string
    {
        return $this->reglements;
    }

    public function setReglements(?string $reglements): self
    {
        $this->reglements = $reglements;
        return $this;
    }

    /**
     * @return Collection<int, Matches>
     */
    public function getMatches(): Collection
    {
        return $this->matches;
    }

    public function addMatch(Matches $match): self
    {
        if (!$this->matches->contains($match)) {
            $this->matches->add($match);
            $match->setTournoi($this);
        }
        return $this;
    }

    public function removeMatch(Matches $match): self
    {
        if ($this->matches->removeElement($match)) {
            if ($match->getTournoi() === $this) {
            }
        }
        return $this;
    }

    /**
     * @return Collection<int, Ranking>
     */
    public function getRankings(): Collection
    {
        return $this->rankings;
    }

    public function addRanking(Ranking $ranking): self
    {
        if (!$this->rankings->contains($ranking)) {
            $this->rankings->add($ranking);
            $ranking->setTournoi($this);
        }
        return $this;
    }

    public function removeRanking(Ranking $ranking): self
    {
        if ($this->rankings->removeElement($ranking)) {
            if ($ranking->getTournoi() === $this) {
                $ranking->setTournoi(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection<int, Team>
     */
    public function getTeams(): Collection
    {
        return $this->teams;
    }

    public function addTeam(Team $team): self
    {
        if (!$this->teams->contains($team)) {
            $this->teams->add($team);
            $team->setTournoi($this);
        }
        return $this;
    }

    public function removeTeam(Team $team): self
    {
        if ($this->teams->removeElement($team)) {
            if ($team->getTournoi() === $this) {
                $team->setTournoi(null);
            }
        }
        return $this;
    }
}
