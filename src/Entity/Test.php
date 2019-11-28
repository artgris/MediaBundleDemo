<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Artgris\Bundle\MediaBundle\Form\Validator\Constraint as MediaAssert;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 */
class Test
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @var string
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $image;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $private;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $privateDoc;

    /**
     * @var Collection|string[]
     * @ORM\Column(type="simple_array", nullable=true)
     * @MediaAssert\Image()
     */
    private $gallery;

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    public function getGallery()
    {
        return $this->gallery;
    }

    public function setGallery($gallery): void
    {
        $this->gallery = $gallery;
    }

    public function getPrivate(): ?string
    {
        return $this->private;
    }

    public function setPrivate(?string $private): void
    {
        $this->private = $private;
    }

    public function getPrivateDoc(): ?string
    {
        return $this->privateDoc;
    }

    public function setPrivateDoc(?string $privateDoc): void
    {
        $this->privateDoc = $privateDoc;
    }

}
