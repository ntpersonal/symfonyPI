<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\TeamRepository;
#[ORM\Entity(repositoryClass: TeamRepository::class)]
#[ORM\Table(name: 'team')]
class Team
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

    #[ORM\Column(name:"categorie",type: 'string', nullable: false)]
    private ?string $categorie = null;

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;
        return $this;
    }

    #[ORM\Column(name: 'ModeJeu', type: 'string', nullable: false)]
    private ?string $modeJeu = null;

    public function getModeJeu(): ?string
    {
        return $this->modeJeu;
    }

    public function setModeJeu(string $modeJeu): self
    {
        $this->modeJeu = $modeJeu;
        return $this;
    }

    #[ORM\Column(name: 'NombreJoueurs', type: 'integer', nullable: false)]
    private ?int $nombreJoueurs = null;

    public function getNombreJoueurs(): ?int
    {
        return $this->nombreJoueurs;
    }

    public function setNombreJoueurs(int $nombreJoueurs): self
    {
        $this->nombreJoueurs = $nombreJoueurs;
        return $this;
    }

    #[ORM\Column(name: 'LogoPath', type: 'string', nullable: true)]
    private ?string $logoPath = null;

    public function getLogoPath(): ?string
    {
        return $this->logoPath;
    }

    public function setLogoPath(?string $logoPath): self
    {
        $this->logoPath = $logoPath;
        return $this;
    }

    #[ORM\ManyToOne(targetEntity: Tournoi::class, inversedBy: 'teams')]
    #[ORM\JoinColumn(name: 'idtournoi', referencedColumnName: 'id')]
    private ?Tournoi $tournoi = null;

    public function getTournoi(): ?Tournoi
    {
        return $this->tournoi;
    }

    public function setTournoi(?Tournoi $tournoi): self
    {
        $this->tournoi = $tournoi;
        return $this;
    }

    #[ORM\OneToMany(targetEntity: Matche::class, mappedBy: 'team')]
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

    public function addMatche(Matche $matche): self
    {
        if (!$this->getMatches()->contains($matche)) {
            $this->getMatches()->add($matche);
        }
        return $this;
    }

    public function removeMatche(Matche $matche): self
    {
        $this->getMatches()->removeElement($matche);
        return $this;
    }

   

    #[ORM\OneToMany(targetEntity: Ranking::class, mappedBy: 'team')]
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

    
    #[ORM\OneToMany(targetEntity: User::class, mappedBy: 'team')]
    private Collection $users;

    public function __construct()
    {
        $this->matches = new ArrayCollection();
        $this->rankings = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        if (!$this->users instanceof Collection) {
            $this->users = new ArrayCollection();
        }
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->getUsers()->contains($user)) {
            $this->getUsers()->add($user);
        }
        return $this;
    }

    public function removeUser(User $user): self
    {
        $this->getUsers()->removeElement($user);
        return $this;
    }

    public function addMatch(Matche $match,team $teamA,team $teamB): static
    {
        if (!$this->matches->contains($match)) {
            $this->matches->add($match);
            $match->setTeamA($teamA);
            $match->setTeamB($teamB);
            $match->setTeamAName($teamA->getNom());
            $match->setTeamBName($teamB->getNom());
            $match->setLocation_Match($match->getLocation_Match());
            $match->setMatch_Time($match->getMatch_Time());
            $match->setStatus($match->getStatus());
        }

        return $this;
    }

    public function removeMatch(Matche $match): static
    {
        if ($this->matches->removeElement($match)) {
            // set the owning side to null (unless already changed)
            if ($match->getTeamA() === $this) {
                $match->setTeamA(null);
            }
            if ($match->getTeamB() === $this) {
                $match->setTeamB(null);
            }
        }

        return $this;
    }

}
