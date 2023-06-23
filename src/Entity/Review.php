<?php

namespace App\Entity;

use App\Repository\ReviewRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=ReviewRepository::class)
 */
class Review
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"review_browse", "review_read"})
     * @Groups({"user_read", "user_browse"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"review_browse", "review_read"})
     * @Groups({"user_read", "user_browse"})
     * @Assert\NotBlank( message = "Le commentaire ne peut pas être vide")
     */
    private $comment;

    /**
     * @ORM\Column(type="float")
     * @Groups({"review_browse", "review_read"})
     * @Groups({"user_read", "user_browse"})
     */
    private $rating;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"review_browse", "review_read"})
     * @Groups({"user_read", "user_browse"})
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reviews")
     * @Groups({"review_browse", "review_read"})
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

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getRating(): ?float
    {
        return $this->rating;
    }

    public function setRating(float $rating): self
    {
        $this->rating = $rating;

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
