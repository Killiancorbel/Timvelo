<?php

namespace TV\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Race
 *
 * @ORM\Table(name="race")
 * @ORM\Entity(repositoryClass="TV\CoreBundle\Repository\RaceRepository")
 */
class Race
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @ORM\OneToOne(targetEntity="TV\CoreBundle\Entity\Profile", cascade={"persist"})
     */
    private $profile;

    /**
     * @ORM\OneToOne(targetEntity="TV\CoreBundle\Entity\Flag", cascade={"persist"})
     */
    private $flag;

    /**
     * @ORM\OneToOne(targetEntity="TV\CoreBundle\Entity\Classification", cascade={"persist"})
     */
    private $classification;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="profilepic", type="string", length=255, nullable=true)
     */
    private $profilepic;


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
     * @return Race
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Race
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    public function getProfile()
    {
        return $this->profile;
    }

    public function setProfile(Profile $profile)
    {
        $this->profile = $profile;
    }

    public function getFlag()
    {
        return $this->flag;
    }

    public function setFlag(Flag $flag)
    {
        $this->flag = $flag;
    }

    public function getClassification()
    {
        return $this->classification;
    }

    public function setClassification(Classification $classification)
    {
        $this->classification = $classification;
    }

    public function getLogo()
    {
        return $this->logo;
    }
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    public function getProfilepic()
    {
        return $this->profilepic;
    }
    public function setProfilepic($pic)
    {
        $this->profilepic = $pic;
    }

}

