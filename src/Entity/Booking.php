<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: BookingRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Booking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank(message: 'Veuillez renseigner une date')]
    #[Assert\GreaterThan('+1 hour', message: 'Votre réservation doit être prise au moins 1 heure à l\'avance')]
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[Assert\NotBlank(message: 'Veuillez renseigner le nombre de couverts')]
    #[Assert\GreaterThan(0, message: 'Le nombre de couverts doit être supérieur à 0')]
    #[ORM\Column]
    private ?int $nbPlaces = null;

    #[Assert\NotBlank(message: 'Veuillez renseigner votre nom')]
    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[Assert\NotBlank(message: 'Veuillez renseigner votre email')]
    #[Assert\Email(
        message: 'L\'adresse {{ value }} n\'est pas une adresse valide.',
    )]
    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[Assert\NotBlank(message: 'Veuillez renseigner votre numéro de téléphone')]
    #[Assert\Regex(
        pattern: '/^\+?\d{10,12}$/',
        message: 'Le numéro {{ value }} n\'est pas au bon format.',
    )]
    #[ORM\Column(length: 255)]
    private ?string $phone = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $bookedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getNbPlaces(): ?int
    {
        return $this->nbPlaces;
    }

    public function setNbPlaces(int $nbPlaces): self
    {
        $this->nbPlaces = $nbPlaces;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getBookedAt(): ?\DateTimeImmutable
    {
        return $this->bookedAt;
    }

    #[ORM\PrePersist]

    public function onCreate(): void
    {
        $this->bookedAt = new \DateTimeImmutable();
    }
}
