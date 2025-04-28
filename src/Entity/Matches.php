<?php
// src/Entity/Matches.php

namespace App\Entity;

use App\Repository\MatchesRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Team;
use App\Entity\Tournoi;

#[ORM\Entity(repositoryClass: MatchesRepository::class)]
#[ORM\Table(name: 'matches')]
class Matches
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'score_teamA', type: 'integer')]
    private ?int $scoreTeamA = null;

    #[ORM\Column(name: 'score_teamB', type: 'integer')]
    private ?int $scoreTeamB = null;

    #[ORM\Column(name: 'status', type: 'string')]
    private ?string $status = null;

    #[ORM\Column(name: 'match_Time', type: 'datetime')]
    private ?\DateTimeInterface $matchTime = null;

    #[ORM\Column(name: 'location_Match', type: 'string')]
    private ?string $locationMatch = null;

    #[ORM\ManyToOne(targetEntity: Team::class, inversedBy: 'matches')]
    #[ORM\JoinColumn(name: 'id_TeamA', referencedColumnName: 'id', nullable: false)]
    private ?Team $teamA = null;

    #[ORM\ManyToOne(targetEntity: Team::class, inversedBy: 'matches')]
    #[ORM\JoinColumn(name: 'id_TeamB', referencedColumnName: 'id', nullable: false)]
    private ?Team $teamB = null;

    #[ORM\ManyToOne(targetEntity: Tournoi::class, inversedBy: 'matches')]
    #[ORM\JoinColumn(
        name: 'id_tournoi',
        referencedColumnName: 'id',
        nullable: false,
        onDelete: 'CASCADE'
    )]
    private ?Tournoi $tournoi = null;

    #[ORM\Column(name: 'teamAName', type: 'string', nullable: true)]
    private ?string $teamAName = null;

    #[ORM\Column(name: 'teamBName', type: 'string', nullable: true)]
    private ?string $teamBName = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScoreTeamA(): ?int
    {
        return $this->scoreTeamA;
    }

    public function setScoreTeamA(int $scoreTeamA): self
    {
        $this->scoreTeamA = $scoreTeamA;
        return $this;
    }

    public function getScoreTeamB(): ?int
    {
        return $this->scoreTeamB;
    }

    public function setScoreTeamB(int $scoreTeamB): self
    {
        $this->scoreTeamB = $scoreTeamB;
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getMatchTime(): ?\DateTimeInterface
    {
        return $this->matchTime;
    }

    public function setMatchTime(\DateTimeInterface $matchTime): self
    {
        $this->matchTime = $matchTime;
        return $this;
    }

    public function getLocationMatch(): ?string
    {
        return $this->locationMatch;
    }

    public function setLocationMatch(string $locationMatch): self
    {
        $this->locationMatch = $locationMatch;
        return $this;
    }

    public function getTeamA(): ?Team
    {
        return $this->teamA;
    }

    public function setTeamA(Team $teamA): self
    {
        $this->teamA = $teamA;
        return $this;
    }

    public function getTeamB(): ?Team
    {
        return $this->teamB;
    }

    public function setTeamB(Team $teamB): self
    {
        $this->teamB = $teamB;
        return $this;
    }

    public function getTournoi(): ?Tournoi
    {
        return $this->tournoi;
    }

    public function setTournoi(Tournoi $tournoi): self
    {
        $this->tournoi = $tournoi;
        return $this;
    }

    public function getTeamAName(): ?string
    {
        return $this->teamAName;
    }

    public function setTeamAName(?string $teamAName): self
    {
        $this->teamAName = $teamAName;
        return $this;
    }

    public function getTeamBName(): ?string
    {
        return $this->teamBName;
    }

    public function setTeamBName(?string $teamBName): self
    {
        $this->teamBName = $teamBName;
        return $this;
    }
}
