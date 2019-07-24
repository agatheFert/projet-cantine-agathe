<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MenuRepository")
 */
class Menu
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Cantine", inversedBy="menus")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cantine;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Entree", mappedBy="menu")
     */
    private $entrees;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Plat", mappedBy="menu")
     */
    private $plats;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Accompagnement", mappedBy="menu")
     */
    private $accompagnements;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Dessert", mappedBy="menu")
     */
    private $desserts;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="menu")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cantine", inversedBy="menusCree")
     * @ORM\JoinColumn(nullable=false)
     */
    private $menuOfCantine;

    /**
     * @ORM\Column(type="date", nullable=false)
     */
    private $date;

    public function __construct()
    {
        $this->cantines = new ArrayCollection();
        $this->entrees = new ArrayCollection();
        $this->plats = new ArrayCollection();
        $this->accompagnements = new ArrayCollection();
        $this->desserts = new ArrayCollection();
        $this->users = new ArrayCollection();

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Menu
     */
    public function setName(string $name): self
    {
        $this->name = $this->nameDateCantine(); ;

        return $this;
    }

    public function getCantine(): ?Cantine
    {
        return $this->cantine;
    }

    public function setCantine(?Cantine $cantine): self
    {
        $this->cantine = $cantine;

        return $this;
    }

    /**
     * @return Collection|Entree[]
     */
    public function getEntrees(): Collection
    {
        return $this->entrees;
    }

    public function addEntree(Entree $entree): self
    {
        if (!$this->entrees->contains($entree)) {
            $this->entrees[] = $entree;
            $entree->addMenu($this);
        }

        return $this;
    }

    public function removeEntree(Entree $entree): self
    {
        if ($this->entrees->contains($entree)) {
            $this->entrees->removeElement($entree);
            $entree->removeMenu($this);
        }

        return $this;
    }

    /**
     * @return Collection|Plat[]
     */
    public function getPlats(): Collection
    {
        return $this->plats;
    }

    public function addPlat(Plat $plat): self
    {
        if (!$this->plats->contains($plat)) {
            $this->plats[] = $plat;
            $plat->addMenu($this);
        }

        return $this;
    }

    public function removePlat(Plat $plat): self
    {
        if ($this->plats->contains($plat)) {
            $this->plats->removeElement($plat);
            $plat->removeMenu($this);
        }

        return $this;
    }

    /**
     * @return Collection|Accompagnement[]
     */
    public function getAccompagnements(): Collection
    {
        return $this->accompagnements;
    }

    public function addAccompagnement(Accompagnement $accompagnement): self
    {
        if (!$this->accompagnements->contains($accompagnement)) {
            $this->accompagnements[] = $accompagnement;
            $accompagnement->addMenu($this);
        }

        return $this;
    }

    public function removeAccompagnement(Accompagnement $accompagnement): self
    {
        if ($this->accompagnements->contains($accompagnement)) {
            $this->accompagnements->removeElement($accompagnement);
            $accompagnement->removeMenu($this);
        }

        return $this;
    }

    /**
     * @return Collection|Dessert[]
     */
    public function getDesserts(): Collection
    {
        return $this->desserts;
    }

    public function addDessert(Dessert $dessert): self
    {
        if (!$this->desserts->contains($dessert)) {
            $this->desserts[] = $dessert;
            $dessert->addMenu($this);
        }

        return $this;
    }

    public function removeDessert(Dessert $dessert): self
    {
        if ($this->desserts->contains($dessert)) {
            $this->desserts->removeElement($dessert);
            $dessert->removeMenu($this);
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addMenu($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeMenu($this);
        }

        return $this;
    }

    public function getMenuOfCantine(): ?Cantine
    {
        return $this->menuOfCantine;
    }

    public function setMenuOfCantine(?Cantine $menuOfCantine): self
    {
        $this->menuOfCantine = $menuOfCantine;

        return $this;
    }
    public function __toString(): string
    {
        return $this->name;
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

    public function nameDateCantine() {
        return 'Menu du de la Cantine' ;
    }




}
