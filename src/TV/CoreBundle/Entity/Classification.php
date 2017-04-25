<?php

namespace TV\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classification
 *
 * @ORM\Table(name="classification")
 * @ORM\Entity(repositoryClass="TV\CoreBundle\Repository\ClassificationRepository")
 */
class Classification
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="ident", type="string", length=255)
     */
    private $ident;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Classification
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set ident
     *
     * @param string $ident
     *
     * @return Classification
     */
    public function setIdent($ident)
    {
        $this->ident = $ident;

        return $this;
    }

    /**
     * Get ident
     *
     * @return string
     */
    public function getIdent()
    {
        return $this->ident;
    }
}

