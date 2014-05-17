<?php

namespace Walva\AdSiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\ManyToMany(targetEntity="Walva\UserBundle\Entity\User")
     */
    private $owner;

    /**
     * @var \stdClass
     *
     * @ORM\ManyToMany(targetEntity="Walva\AdSiteBundle\Entity\Space")
     */
    private $spaces;

    /**
     * @var \stdClass
     *
     * @ORM\OneToMany(targetEntity="Walva\AdSiteBundle\Entity\Ads", mappedBy="campagne")
     * @ORM\JoinColumn(nullable=true)
     */
    private $ads;

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
     * Set owner
     *
     * @param \stdClass $owner
     * @return Campagne
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    
        return $this;
    }

    /**
     * Get owner
     *
     * @return \stdClass 
     */
    public function getOwner()
    {
        return $this->owner;
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
     * Set spaces
     *
     * @param \stdClass $spaces
     * @return Campagne
     */
    public function setSpaces($spaces)
    {
        $this->spaces = $spaces;
    
        return $this;
    }

    /**
     * Get spaces
     *
     * @return \stdClass 
     */
    public function getSpaces()
    {
        return $this->spaces;
    }

    /**
     * Set ads
     *
     * @param \stdClass $ads
     * @return Campagne
     */
    public function setAds($ads)
    {
        $this->ads = $ads;
    
        return $this;
    }

    /**
     * Get ads
     *
     * @return \stdClass 
     */
    public function getAds()
    {
        return $this->ads;
    }
}
