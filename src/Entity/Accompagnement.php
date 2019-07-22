<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AccompagnementRepository")
 */
class Accompagnement
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
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Menu", inversedBy="accompagnements")
     */
    private $menu;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MenuSelectionne", mappedBy="accompagnement")
     */
    private $menuSelectionnes;

    public function __construct()
    {
        $this->menu = new ArrayCollection();
        $this->menuSelectionnes = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|Menu[]
     */
    public function getMenu(): Collection
    {
        return $this->menu;
    }

    public function addMenu(Menu $menu): self
    {
        if (!$this->menu->contains($menu)) {
            $this->menu[] = $menu;
        }

        return $this;
    }

    public function removeMenu(Menu $menu): self
    {
        if ($this->menu->contains($menu)) {
            $this->menu->removeElement($menu);
        }

        return $this;
    }

    /**
     * @return Collection|MenuSelectionne[]
     */
    public function getMenuSelectionnes(): Collection
    {
        return $this->menuSelectionnes;
    }

    public function addMenuSelectionne(MenuSelectionne $menuSelectionne): self
    {
        if (!$this->menuSelectionnes->contains($menuSelectionne)) {
            $this->menuSelectionnes[] = $menuSelectionne;
            $menuSelectionne->setAccompagnement($this);
        }

        return $this;
    }

    public function removeMenuSelectionne(MenuSelectionne $menuSelectionne): self
    {
        if ($this->menuSelectionnes->contains($menuSelectionne)) {
            $this->menuSelectionnes->removeElement($menuSelectionne);
            // set the owning side to null (unless already changed)
            if ($menuSelectionne->getAccompagnement() === $this) {
                $menuSelectionne->setAccompagnement(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }




}
