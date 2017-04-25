<?php

namespace TV\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rider
 *
 * @ORM\Table(name="rider")
 * @ORM\Entity(repositoryClass="TV\CoreBundle\Repository\RiderRepository")
 */
class Rider
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
     * @ORM\Column(name="forename", type="string", length=255)
     */
    private $forename;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="nickname", type="string", length=255)
     */
    private $nickname;

    /**
     * @ORM\OneToOne(targetEntity="TV\CoreBundle\Entity\Flag", cascade={"persist"})
     */
    private $flag;

    /**
     * @ORM\OneToOne(targetEntity="TV\CoreBundle\Entity\Team", cascade={"persist"})
     */
    private $team;


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
     * Set forename
     *
     * @param string $forename
     *
     * @return Rider
     */
    public function setForename($forename)
    {
        $this->forename = $forename;

        return $this;
    }

    /**
     * Get forename
     *
     * @return string
     */
    public function getForename()
    {
        return $this->forename;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Rider
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
     * Set nickname
     *
     * @param string $nickname
     *
     * @return Rider
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Get nickname
     *
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    public function getFlag()
    {
        return $this->flag;
    }

    public function setFlag(Flag $flag)
    {
        $this->flag = $flag;
    }

    public function getTeam()
    {
        return $this->team;
    }

    public function setTeam(Team $team)
    {
        $this->team = $team;
    }
}

