<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\MatcheRepository;

#[ORM\Entity(repositoryClass: MatcheRepository::class)]
#[ORM\Table(name: 'matches')]
class Matche
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

    #[ORM\ManyToOne(targetEntity: Team::class, inversedBy: 'matches')]
    #[ORM\JoinColumn(name: 'id_TeamA', referencedColumnName: 'id')]
    private ?Team $teamA = null;

    public function getTeamA(): ?Team
    {
        return $this->teamA;
    }

    public function setTeamA(?Team $teamA): self
    {
        $this->teamA = $teamA;
        return $this;
    }

    #[ORM\ManyToOne(targetEntity: Team::class, inversedBy: 'matches')]
    #[ORM\JoinColumn(name: 'id_TeamB', referencedColumnName: 'id')]
    private ?Team $teamB = null;

    public function getTeamB(): ?Team
    {
        return $this->teamB;
    }

    public function setTeamB(?Team $teamB): self
    {
        $this->teamB = $teamB;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $score_TeamA = null;

    public function getScore_TeamA(): ?int
    {
        return $this->score_TeamA;
    }

    public function setScore_TeamA(int $score_TeamA): self
    {
        $this->score_TeamA = $score_TeamA;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $score_TeamB = null;

    public function getScore_TeamB(): ?int
    {
        return $this->score_TeamB;
    }

    public function setScore_TeamB(int $score_TeamB): self
    {
        $this->score_TeamB = $score_TeamB;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $status = null;

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    #[ORM\Column(type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $match_Time = null;

    public function getMatch_Time(): ?\DateTimeInterface
    {
        return $this->match_Time;
    }

    public function setMatch_Time(\DateTimeInterface $match_Time): self
    {
        $this->match_Time = $match_Time;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $location_Match = null;

    public function getLocation_Match(): ?string
    {
        return $this->location_Match;
    }

    public function setLocation_Match(string $location_Match): self
    {
        $this->location_Match = $location_Match;
        return $this;
    }

    #[ORM\ManyToOne(targetEntity: Tournoi::class, inversedBy: 'matches')]
    #[ORM\JoinColumn(name: 'id_tournoi', referencedColumnName: 'id')]
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

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $teamAName = null;

    public function getTeamAName(): ?string
    {
        return $this->teamAName;
    }

    public function setTeamAName(?string $teamAName): self
    {
        $this->teamAName = $teamAName;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $teamBName = null;

    public function getTeamBName(): ?string
    {
        return $this->teamBName;
    }

    public function setTeamBName(?string $teamBName): self
    {
        $this->teamBName = $teamBName;
        return $this;
    }

    public function getScoreTeamA(): ?int
    {
        return $this->score_TeamA;
    }

    public function setScoreTeamA(int $score_TeamA): static
    {
        $this->score_TeamA = $score_TeamA;

        return $this;
    }

    public function getScoreTeamB(): ?int
    {
        return $this->score_TeamB;
    }

    public function setScoreTeamB(int $score_TeamB): static
    {
        $this->score_TeamB = $score_TeamB;

        return $this;
    }

    public function getMatchTime(): ?\DateTimeInterface
    {
        return $this->match_Time;
    }

    public function setMatchTime(\DateTimeInterface $match_Time): static
    {
        $this->match_Time = $match_Time;

        return $this;
    }

    public function getLocationMatch(): ?string
    {
        return $this->location_Match;
    }

    public function setLocationMatch(string $location_Match): static
    {
        $this->location_Match = $location_Match;

        return $this;
    }


}
