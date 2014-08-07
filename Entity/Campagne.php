<?php

namespace Walva\AdSiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Campagne
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Walva\AdSiteBundle\Entity\CampagneRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Campagne
{
    /**
     * @var integer
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
     * @ORM\Column(name="creationDate", type="datetime")
     */
    private $creationDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="editionDate", type="datetime")
     */
    private $editionDate;

    /**
     * @var \stdClass
     *
     * @ORM\ManyToOne(targetEntity="Walva\UserBundle\Entity\User")
     */
    private $owner;


    /**
     * @var \stdClass
     *
     * @ORM\OneToMany(targetEntity="Walva\AdSiteBundle\Entity\Ads", mappedBy="campagne")
     * @ORM\JoinColumn(nullable=true)
     */
    private $ads;

    /**
     * @var \stdClass
     *
     * @ORM\OneToOne(targetEntity="Walva\AdSiteBundle\Entity\Format")
     * @ORM\JoinColumn(nullable=true)
     */
    private $format;

    /**
     * @ORM\PrePersist
     */
    public function prePersist(){
        $this->setCreationDate(new \DateTime('NOW'));
    }

    /**
     * @ORM\PreUpdate()
     */
    public function preUpdate(){
        $this->setEditionDate(new \DateTime('NOW'));
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ads = new \Doctrine\Common\Collections\ArrayCollection();
        $date = new \DateTime('NOW');
        $dateHumaine = $date->format("d/m/Y");
        $this->setName('Campagne du '.$dateHumaine);
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Campagne
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
     * Set creationDate
     *
     * @param \DateTime $creationDate
     * @return Campagne
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    
        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime 
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set editionDate
     *
     * @param \DateTime $editionDate
     * @return Campagne
     */
    public function setEditionDate($editionDate)
    {
        $this->editionDate = $editionDate;
    
        return $this;
    }

    /**
     * Get editionDate
     *
     * @return \DateTime 
     */
    public function getEditionDate()
    {
        return $this->editionDate;
    }

    /**
     * Set owner
     *
     * @param \Walva\UserBundle\Entity\User $owner
     * @return Campagne
     */
    public function setOwner(\Walva\UserBundle\Entity\User $owner = null)
    {
        $this->owner = $owner;
    
        return $this;
    }

    /**
     * Get owner
     *
     * @return \Walva\UserBundle\Entity\User 
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Add ads
     *
     * @param \Walva\AdSiteBundle\Entity\Ads $ads
     * @return Campagne
     */
    public function addAd(\Walva\AdSiteBundle\Entity\Ads $ads)
    {
        $this->ads[] = $ads;
    
        return $this;
    }

    /**
     * Remove ads
     *
     * @param \Walva\AdSiteBundle\Entity\Ads $ads
     */
    public function removeAd(\Walva\AdSiteBundle\Entity\Ads $ads)
    {
        $this->ads->removeElement($ads);
    }

    /**
     * Get ads
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAds()
    {
        return $this->ads;
    }

    /**
     * Set format
     *
     * @param \Walva\AdSiteBundle\Entity\Format $format
     * @return Campagne
     */
    public function setFormat(\Walva\AdSiteBundle\Entity\Format $format = null)
    {
        $this->format = $format;
    
        return $this;
    }

    /**
     * Get format
     *
     * @return \Walva\AdSiteBundle\Entity\Format 
     */
    public function getFormat()
    {
        return $this->format;
    }
}