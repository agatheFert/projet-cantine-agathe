<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CantineRepository")
 */
class Cantine
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
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $code_postal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gerant;



    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Menu", mappedBy="cantine")
     */
    private $menus;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="cantine")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Menu", mappedBy="menuOfCantine")
     */
    private $menusCree;

    public function __construct()
    {
        $this->menus = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->menusCree = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     * Convertir Users en string
     */
    public function __toString()

    {


        return $this->name;
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->code_postal;
    }

    public function setCodePostal(int $code_postal): self
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

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

    public function getGerant(): ?string
    {
        return $this->gerant;
    }

    public function setGerant(string $gerant): self
    {
        $this->gerant = $gerant;

        return $this;
    }

    /**
     * @return Collection|Menu[]
     */
    public function getMenus(): Collection
    {
        return $this->menus;
    }

    public function addMenu(Menu $menu): self
    {
        if (!$this->menus->contains($menu)) {
            $this->menus[] = $menu;
            $menu->setCantine($this);
        }

        return $this;
    }

    public function removeMenu(Menu $menu): self
    {
        if ($this->menus->contains($menu)) {
            $this->menus->removeElement($menu);
            // set the owning side to null (unless already changed)
            if ($menu->getCantine() === $this) {
                $menu->setCantine(null);
            }
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
            $user->addCantine($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeCantine($this);
        }

        return $this;
    }

    /**
     * @return Collection|Menu[]
     */
    public function getMenusCree(): Collection
    {
        return $this->menusCree;
    }

    public function addMenusCree(Menu $menusCree): self
    {
        if (!$this->menusCree->contains($menusCree)) {
            $this->menusCree[] = $menusCree;
            $menusCree->setMenuOfCantine($this);
        }

        return $this;
    }

    public function removeMenusCree(Menu $menusCree): self
    {
        if ($this->menusCree->contains($menusCree)) {
            $this->menusCree->removeElement($menusCree);
            // set the owning side to null (unless already changed)
            if ($menusCree->getMenuOfCantine() === $this) {
                $menusCree->setMenuOfCantine(null);
            }
        }

        return $this;
    }







}
