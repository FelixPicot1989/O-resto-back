<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=MenuRepository::class)
 */
class Menu
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"eat_browse", "eat_read"})
     * @Groups({"menu_browse", "menu_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     * 
     * @Groups({"eat_browse", "eat_read"})
     * @Groups({"menu_browse", "menu_read"})
     */
    private $name;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     * 
     * @Groups({"eat_browse", "eat_read"})
     * @Groups({"menu_browse", "menu_read"})
     */
    private $price;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity=Eat::class, mappedBy="menu")
     * 
     * @Groups({"eat_browse", "eat_read"})
     * @Groups({"menu_browse", "menu_read"})
     */
    private $eats;

    public function __construct()
    {
        $this->eats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

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
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, Eat>
     */
    public function getEats(): Collection
    {
        return $this->eats;
    }

    public function addEat(Eat $eat): self
    {
        if (!$this->eats->contains($eat)) {
            $this->eats[] = $eat;
            $eat->addMenu($this);
        }

        return $this;
    }

    public function removeEat(Eat $eat): self
    {
        if ($this->eats->removeElement($eat)) {
            $eat->removeMenu($this);
        }

        return $this;
    }
}
