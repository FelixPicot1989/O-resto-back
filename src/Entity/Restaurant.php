<?php

namespace App\Entity;

use App\Repository\RestaurantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * @ORM\Entity(repositoryClass=RestaurantRepository::class)
 */
class Restaurant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups({"restaurant_browse", "restaurant_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * 
     * @Groups({"restaurant_browse", "restaurant_read"})
     * 
     * @Assert\NotBlank( message = "L'histoire du restaurant ne peut pas être vide")
     */

    private $history;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"restaurant_browse", "restaurant_read" })
     * 
     * @Assert\NotBlank( message = "Les heures d'ouvertures doivent être renseignées")

     */
    private $openingLunch;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"restaurant_browse", "restaurant_read"})
     * 
     * @Assert\NotBlank( message = "L'adresse doit être renseignée")

     */
    private $address;

    /**
     * @ORM\Column(type="string", length=32)
     * @Groups({"restaurant_browse", "restaurant_read"})
     * 
     * @Assert\NotBlank( message = "Le numéro de téléphone doit être renseigné")
     */
    private $phone;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="restaurant")
     * @Groups({"restaurant_browse", "restaurant_read"})
     * @Groups({"image_browse", "image_read"})
     * 
     */
    private $images;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"restaurant_browse", "restaurant_read"})
     * 
     * @Assert\NotBlank( message = "Les heures d'ouvertures doivent êtres renseignées")
     */
    private $openingEvening;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"restaurant_browse", "restaurant_read"})     
     */
    private $info;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->setCreatedAt(new \DateTime());

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHistory(): ?string
    {
        return $this->history;
    }

    public function setHistory(string $history): self
    {
        $this->history = $history;

        return $this;
    }

    public function getOpeningLunch(): ?string
    {
        return $this->openingLunch;
    }

    public function setOpeningLunch(string $openingLunch): self
    {
        $this->openingLunch = $openingLunch;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

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

    /**
     * @return Collection<int, Image>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setRestaurant($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getRestaurant() === $this) {
                $image->setRestaurant(null);
            }
        }

        return $this;
    }

    public function getOpeningEvening(): ?string
    {
        return $this->openingEvening;
    }

    public function setOpeningEvening(string $openingEvening): self
    {
        $this->openingEvening = $openingEvening;

        return $this;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function setInfo(?string $info): self
    {
        $this->info = $info;

        return $this;
    }
}
