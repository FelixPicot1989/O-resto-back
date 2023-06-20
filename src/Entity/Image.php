<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 * @Vich\Uploadable
 */
class Image
{


    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"image_browse", "image_read"})
     * @Groups({"restaurant_browse", "restaurant_read"})
     * @Groups({"eat_browse", "eat_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     * @Groups({"image_browse", "image_read"})
     * 
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"image_browse", "image_read"})
     * @Groups({"category_browse", "category_read"})
     * @Groups({"restaurant_browse", "restaurant_read"})
     * @Groups({"eat_browse", "eat_read"})
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="image", fileNameProperty="image")
     * @var File|null
     */
    private $image_file;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTimeInterface|null
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=Restaurant::class, inversedBy="images")
     */
    private $restaurant;

    public function __construct()
    {
        $this->setCreatedAt(new \DateTime());
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

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

    public function setImageFile(File $image = null)
    {
        $this->image_file = $image;
        if ($image) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->image_file;
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

    public function getRestaurant(): ?Restaurant
    {
        return $this->restaurant;
    }

    public function setRestaurant(?Restaurant $restaurant): self
    {
        $this->restaurant = $restaurant;

        return $this;
    }
}
