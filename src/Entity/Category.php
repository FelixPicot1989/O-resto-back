<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"drink_browse", "drink_read"})
     * @Groups({"eat_browse", "eat_read"})
     * @Groups({"category_browse", "category_read"}})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     * @Groups({"drink_browse", "drink_read"})
     * @Groups({"eat_browse", "eat_read"})
     * @Groups({"category_browse", "category_read"})
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $UpdatedAt;

    /**
     * @ORM\OneToMany(targetEntity=Drink::class, mappedBy="category")
     */
    private $drinks;

    /**
     * @ORM\ManyToMany(targetEntity=Eat::class, mappedBy="category")
     * @Groups({"category_browse", "category_read"}})
     * 
     */
    private $eats;

    public function __construct()
    {
        $this->drinks = new ArrayCollection();
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
        return $this->UpdatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $UpdatedAt): self
    {
        $this->UpdatedAt = $UpdatedAt;

        return $this;
    }

    /**
     * @return Collection<int, Drink>
     */
    public function getDrinks(): Collection
    {
        return $this->drinks;
    }

    public function addDrink(Drink $drink): self
    {
        if (!$this->drinks->contains($drink)) {
            $this->drinks[] = $drink;
            $drink->setCategory($this);
        }

        return $this;
    }

    public function removeDrink(Drink $drink): self
    {
        if ($this->drinks->removeElement($drink)) {
            // set the owning side to null (unless already changed)
            if ($drink->getCategory() === $this) {
                $drink->setCategory(null);
            }
        }

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
            $eat->addCategory($this);
        }

        return $this;
    }

    public function removeEat(Eat $eat): self
    {
        if ($this->eats->removeElement($eat)) {
            $eat->removeCategory($this);
        }

        return $this;
    }
}
