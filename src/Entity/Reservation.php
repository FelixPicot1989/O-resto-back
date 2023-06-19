<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"reservation_browse", "reservation_read"})

     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"reservation_browse", "reservation_read"})
     */
    private $numberOfCovers;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"reservation_browse", "reservation_read"})
     */
    private $date;

    /**
     * @ORM\Column(type="time")
     * @Groups({"reservation_browse", "reservation_read"})
     */
    private $timeSlots;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reservations")
     * @Groups({"reservation_browse", "reservation_read"})
     */
    private $user;

    public function __construct()
    {
        $this->setCreatedAt(new \DateTime());
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberOfCovers(): ?int
    {
        return $this->numberOfCovers;
    }

    public function setNumberOfCovers(int $numberOfCovers): self
    {
        $this->numberOfCovers = $numberOfCovers;

        return $this;
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

    public function getTimeSlots(): ?\DateTimeInterface
    {
        return $this->timeSlots;
    }

    public function setTimeSlots(\DateTimeInterface $timeSlots): self
    {
        $this->timeSlots = $timeSlots;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = new \DateTime('now');
        $this->updatedAt = $updatedAt;

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
}
