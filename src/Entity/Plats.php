<?php

namespace App\Entity;

use App\Repository\PlatsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlatsRepository::class)]
class Plats
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(nullable: true)]
    private ?bool $maison = null;

    #[ORM\Column(nullable: true)]
    private ?bool $gluten = null;

    #[ORM\Column(nullable: true)]
    private ?bool $vegetarien = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $ingredients = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $suggestion = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $complements = null;

    #[ORM\Column(nullable: true)]
    private ?float $prix = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

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

    public function isMaison(): ?bool
    {
        return $this->maison;
    }

    public function setMaison(?bool $maison): self
    {
        $this->maison = $maison;

        return $this;
    }

    public function isGluten(): ?bool
    {
        return $this->gluten;
    }

    public function setGluten(?bool $gluten): self
    {
        $this->gluten = $gluten;

        return $this;
    }

    public function isVegetarien(): ?bool
    {
        return $this->vegetarien;
    }

    public function setVegetarien(?bool $vegetarien): self
    {
        $this->vegetarien = $vegetarien;

        return $this;
    }

    public function getIngredients(): ?string
    {
        return $this->ingredients;
    }

    public function setIngredients(?string $ingredients): self
    {
        $this->ingredients = $ingredients;

        return $this;
    }

    public function getSuggestion(): ?string
    {
        return $this->suggestion;
    }

    public function setSuggestion(?string $suggestion): self
    {
        $this->suggestion = $suggestion;

        return $this;
    }

    public function getComplements(): ?string
    {
        return $this->complements;
    }

    public function setComplements(?string $complements): self
    {
        $this->complements = $complements;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(?float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
