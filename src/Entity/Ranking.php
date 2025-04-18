<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\RankingRepository;

#[ORM\Entity(repositoryClass: RankingRepository::class)]
#[ORM\Table(name: 'ranking')]
class Ranking
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

    #[ORM\ManyToOne(targetEntity: Team::class, inversedBy: 'rankings')]
    #[ORM\JoinColumn(name: 'id_Team', referencedColumnName: 'id')]
    private ?Team $team = null;

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): self
    {
        $this->team = $team;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $points = null;

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(int $points): self
    {
        $this->points = $points;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $position = null;

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;
        return $this;
    }

    #[ORM\ManyToOne(targetEntity: Tournoi::class, inversedBy: 'rankings')]
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

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $wins = null;

    public function getWins(): ?int
    {
        return $this->wins;
    }

    public function setWins(int $wins): self
    {
        $this->wins = $wins;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $draws = null;

    public function getDraws(): ?int
    {
        return $this->draws;
    }

    public function setDraws(int $draws): self
    {
        $this->draws = $draws;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $losses = null;

    public function getLosses(): ?int
    {
        return $this->losses;
    }

    public function setLosses(int $losses): self
    {
        $this->losses = $losses;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $goals_scored = null;

    public function getGoals_scored(): ?int
    {
        return $this->goals_scored;
    }

    public function setGoals_scored(int $goals_scored): self
    {
        $this->goals_scored = $goals_scored;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $goals_conceded = null;

    public function getGoals_conceded(): ?int
    {
        return $this->goals_conceded;
    }

    public function setGoals_conceded(int $goals_conceded): self
    {
        $this->goals_conceded = $goals_conceded;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $goal_difference = null;

    public function getGoal_difference(): ?int
    {
        return $this->goal_difference;
    }

    public function setGoal_difference(int $goal_difference): self
    {
        $this->goal_difference = $goal_difference;
        return $this;
    }

    public function getGoalsScored(): ?int
    {
        return $this->goals_scored;
    }

    public function setGoalsScored(int $goals_scored): static
    {
        $this->goals_scored = $goals_scored;

        return $this;
    }

    public function getGoalsConceded(): ?int
    {
        return $this->goals_conceded;
    }

    public function setGoalsConceded(int $goals_conceded): static
    {
        $this->goals_conceded = $goals_conceded;

        return $this;
    }

    public function getGoalDifference(): ?int
    {
        return $this->goal_difference;
    }

    public function setGoalDifference(int $goal_difference): static
    {
        $this->goal_difference = $goal_difference;

        return $this;
    }

}
