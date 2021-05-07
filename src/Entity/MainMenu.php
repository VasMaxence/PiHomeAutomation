<?php

namespace App\Entity;

use App\Repository\MainMenuRepository;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\This;

/**
 * @ORM\Entity(repositoryClass=MainMenuRepository::class)
 */
class MainMenu
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
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
    private $url;

    /**
     * @ORM\Column(type="boolean")
     */
    private $displayed;

    /**
     * @ORM\Column(type="integer")
     */
    private $parent_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $ordered;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $icon;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $class;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isMenu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titlePage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titleMenu;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isTitle;

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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getDisplayed(): ?bool
    {
        return $this->displayed;
    }

    public function setDisplayed(bool $displayed): self
    {
        $this->displayed = $displayed;

        return $this;
    }

    public function getParentId(): ?int
    {
        return $this->parent_id;
    }

    public function setParentId(int $parent_id): self
    {
        $this->parent_id = $parent_id;

        return $this;
    }

    public function getOrdered(): ?int
    {
        return $this->ordered;
    }

    public function setOrdered(int $ordered): self
    {
        $this->ordered = $ordered;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getClass(): ?string
    {
        return $this->class;
    }

    public function setClass(?string $class): self
    {
        $this->class = $class;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIsMenu(): ?bool
    {
        return $this->isMenu;
    }

    public function setIsMenu(bool $isMenu): self
    {
        $this->isMenu = $isMenu;

        return $this;
    }

    public function getTitlePage(): ?string
    {
        return $this->titlePage;
    }

    public function setTitlePage(string $titlePage): self
    {
        $this->titlePage = $titlePage;

        return $this;
    }

    public function getTitleMenu(): ?string
    {
        return $this->titleMenu;
    }

    public function setTitleMenu(string $titleMenu): self
    {
        $this->titleMenu = $titleMenu;

        return $this;
    }

    public function getIsTitle(): ?bool
    {
        return $this->isTitle;
    }

    public function setIsTitle(bool $title): self
    {
        $this->isTitle = $title;

        return $this;
    }
}
