<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MenuSelectionneRepository")
 */
class MenuSelectionne
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Entree", inversedBy="menuSelectionnes")
     */
    private $entree;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Dessert", inversedBy="menuSelectionnes")
     */
    private $dessert;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Plat", inversedBy="menuSelectionnes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $plat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Accompagnement", inversedBy="menuSelectionnes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $accompagnement;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="menuSelectionnes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reservedUser;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getEntree(): ?Entree
    {
        return $this->entree;
    }

    public function setEntree(?Entree $entree): self
    {
        $this->entree = $entree;

        return $this;
    }

    public function getDessert(): ?Dessert
    {
        return $this->dessert;
    }

    public function setDessert(?Dessert $dessert): self
    {
        $this->dessert = $dessert;

        return $this;
    }

    public function getPlat(): ?Plat
    {
        return $this->plat;
    }

    public function setPlat(?Plat $plat): self
    {
        $this->plat = $plat;

        return $this;
    }

    public function getAccompagnement(): ?Accompagnement
    {
        return $this->accompagnement;
    }

    public function setAccompagnement(?Accompagnement $accompagnement): self
    {
        $this->accompagnement = $accompagnement;

        return $this;
    }

    public function getReservedUser(): ?User
    {
        return $this->reservedUser;
    }

    public function setReservedUser(?User $reservedUser): self
    {
        $this->reservedUser = $reservedUser;

        return $this;
    }
}
