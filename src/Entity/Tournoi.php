<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\TournoiRepository;

#[ORM\Entity(repositoryClass: TournoiRepository::class)]
#[ORM\Table(name: 'tournoi')]
class Tournoi
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    #[ORM\Column(name:"nom",type: 'string', nullable: false)]
    private ?string $nom = null;

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    #[ORM\Column(name:"sportType",type: 'string', nullable: true)]
    private ?string $sportType = null;

    public function getSportType(): ?string
    {
        return $this->sportType;
    }

    public function setSportType(?string $sportType): self
    {
        $this->sportType = $sportType;
        return $this;
    }

    #[ORM\Column(name:"format",type: 'string', nullable: true)]
    private ?string $format = null;

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function setFormat(?string $format): self
    {
        $this->format = $format;
        return $this;
    }

    #[ORM\Column(name:"status",type: 'string', nullable: true)]
    private ?string $status = null;

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;
        return $this;
    }

    #[ORM\Column(name:"start_date",type: 'date', nullable: false)]
    private ?\DateTimeInterface $start_date = null;

    public function getStart_date(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStart_date(\DateTimeInterface $start_date): self
    {
        $this->start_date = $start_date;
        return $this;
    }

    #[ORM\Column(name:"end_date",type: 'date', nullable: false)]
    private ?\DateTimeInterface $end_date = null;

    public function getEnd_date(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEnd_date(\DateTimeInterface $end_date): self
    {
        $this->end_date = $end_date;
        return $this;
    }

    #[ORM\Column(name:"nbEquipe",type: 'integer', nullable: false)]
    private ?int $nbEquipe = null;

    public function getNbEquipe(): ?int
    {
        return $this->nbEquipe;
    }

    public function setNbEquipe(int $nbEquipe): self
    {
        $this->nbEquipe = $nbEquipe;
        return $this;
    }

    #[ORM\Column(name:"tournoiLocation",type: 'string', nullable: true)]
    private ?string $tournoiLocation = null;

    public function getTournoiLocation(): ?string
    {
        return $this->tournoiLocation;
    }

    public function setTournoiLocation(?string $tournoiLocation): self
    {
        $this->tournoiLocation = $tournoiLocation;
        return $this;
    }

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'tournois')]
    #[ORM\JoinColumn(name: 'id_organizer', referencedColumnName: 'id')]
    private ?User $user = null;

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
    }

    #[ORM\Column(name:"reglements",type: 'string', nullable: true)]
    private ?string $reglements = null;

    public function getReglements(): ?string
    {
        return $this->reglements;
    }

    public function setReglements(?string $reglements): self
    {
        $this->reglements = $reglements;
        return $this;
    }

    #[ORM\OneToMany(targetEntity: Matches::class, mappedBy: 'tournoi')]
    private Collection $matches;

    /**
     * @return Collection<int, Matche>
     */
    public function getMatches(): Collection
    {
        if (!$this->matches instanceof Collection) {
            $this->matches = new ArrayCollection();
        }
        return $this->matches;
    }

    public function addMatche(Matches $matche): self
    {
        if (!$this->getMatches()->contains($matche)) {
            $this->getMatches()->add($matche);
        }
        return $this;
    }

    public function removeMatche(Matches $matche): self
    {
        $this->getMatches()->removeElement($matche);
        return $this;
    }

    #[ORM\OneToMany(targetEntity: Ranking::class, mappedBy: 'tournoi')]
    private Collection $rankings;

    /**
     * @return Collection<int, Ranking>
     */
    public function getRankings(): Collection
    {
        if (!$this->rankings instanceof Collection) {
            $this->rankings = new ArrayCollection();
        }
        return $this->rankings;
    }

    public function addRanking(Ranking $ranking): self
    {
        if (!$this->getRankings()->contains($ranking)) {
            $this->getRankings()->add($ranking);
        }
        return $this;
    }

    public function removeRanking(Ranking $ranking): self
    {
        $this->getRankings()->removeElement($ranking);
        return $this;
    }

    #[ORM\OneToMany(targetEntity: Team::class, mappedBy: 'tournoi')]
    private Collection $teams;

    public function __construct()
    {
        $this->matches = new ArrayCollection();
        $this->rankings = new ArrayCollection();
        $this->teams = new ArrayCollection();
    }

    /**
     * @return Collection<int, Team>
     */
    public function getTeams(): Collection
    {
        if (!$this->teams instanceof Collection) {
            $this->teams = new ArrayCollection();
        }
        return $this->teams;
    }

    public function addTeam(Team $team): self
    {
        if (!$this->getTeams()->contains($team)) {
            $this->getTeams()->add($team);
        }
        return $this;
    }

    public function removeTeam(Team $team): self
    {
        $this->getTeams()->removeElement($team);
        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(\DateTimeInterface $start_date): static
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEndDate(\DateTimeInterface $end_date): static
    {
        $this->end_date = $end_date;

        return $this;
    }

    public function addMatch(Matches $match): static
    {
        if (!$this->matches->contains($match)) {
            $this->matches->add($match);
            $match->setTournoi($this);
        }

        return $this;
    }

    public function removeMatch(Matches $match): static
    {
        if ($this->matches->removeElement($match)) {
            // set the owning side to null (unless already changed)
            if ($match->getTournoi() === $this) {
             //   $match->setTournoi(null);
            }
        }

        return $this;
    }

}
