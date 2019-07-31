<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="app_user")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 * * @ORM\HasLifecycleCallbacks()
 */
class  User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Menu", inversedBy="users")
     */
    private $menu;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MenuSelectionne", mappedBy="reservedUser")
     */
    private $menuSelectionnes;

    /**
     * @ORM\Column(type="boolean", options={"default":false})
     */
    private $enabled = false;    

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cantine", inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cantine;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Cantine", mappedBy="administrateur", cascade={"persist", "remove"})
     */
    private $adminCantine;

    public function __construct()
    {
        $this->menu = new ArrayCollection();
        $this->menuSelectionnes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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
            $menuSelectionne->setReservedUser($this);
        }

        return $this;
    }

    public function removeMenuSelectionne(MenuSelectionne $menuSelectionne): self
    {
        if ($this->menuSelectionnes->contains($menuSelectionne)) {
            $this->menuSelectionnes->removeElement($menuSelectionne);
            // set the owning side to null (unless already changed)
            if ($menuSelectionne->getReservedUser() === $this) {
                $menuSelectionne->setReservedUser(null);
            }
        }

        return $this;
    }

    /**
     * On définie cette méthode pour afficher
     * le mail des Users  dans la liste déroulante
     * du formulaire Cantine de EasyAdmin
     * @return string
     */
    public function __toString(): string
    {
        return $this->email;
    }

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

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

    public function getAdminCantine(): ?Cantine
    {
        return $this->adminCantine;
    }

    public function setAdminCantine(Cantine $adminCantine): self
    {
        $this->adminCantine = $adminCantine;

        // set the owning side of the relation if necessary
        if ($this !== $adminCantine->getAdministrateur()) {
            $adminCantine->setAdministrateur($this);
        }

        return $this;
    }


}
