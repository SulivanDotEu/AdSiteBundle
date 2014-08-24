<?php

namespace Walva\AdSiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ads
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Walva\AdSiteBundle\Entity\AdsRepository")
 * @ORM\HasLifecycleCallbacks();
 */
class Ads
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
     * @var Format
     *
     * @ORM\ManyToOne(targetEntity="Walva\AdSiteBundle\Entity\Format")
     */
    private $format;

    /**
     * @var Campagne
     *
     * @ORM\ManyToOne(targetEntity="Walva\AdSiteBundle\Entity\Campagne", inversedBy="ads")
     */
    private $campagne;

    /**
     * @var \stdClass
     * @todo
     * @ORM\Column(name="source", type="object")
     */
    private $source;

    /**
     * @var \stdClass
     *
     * @ORM\ManyToOne(targetEntity="Walva\UserBundle\Entity\User")
     */
    private $owner;


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
     * @return Ads
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
     * Set format
     *
     * @param \stdClass $format
     * @return Ads
     */
    public function setFormat($format)
    {
        $this->format = $format;
    
        return $this;
    }

    /**
     * Get format
     *
     * @return \stdClass 
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set campagne
     *
     * @param \stdClass $campagne
     * @return Ads
     */
    public function setCampagne($campagne)
    {
        $this->campagne = $campagne;
    
        return $this;
    }

    /**
     * Get campagne
     *
     * @return \stdClass 
     */
    public function getCampagne()
    {
        return $this->campagne;
    }

    /**
     * Set source
     *
     * @param \stdClass $source
     * @return Ads
     */
    public function setSource($source)
    {
        $this->source = $source;
    
        return $this;
    }

    /**
     * Get source
     *
     * @return \stdClass 
     */
    public function getSource()
    {
        return $this->source;
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
}
