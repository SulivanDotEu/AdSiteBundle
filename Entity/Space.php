<?php

namespace Walva\AdSiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Space
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Walva\AdSiteBundle\Entity\SpaceRepository")
 */
class Space
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
     * @ORM\Column(name="website", type="string", length=255)
     */
    private $website;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


    /**
     * @var \stdClass
     *
     * @ORM\ManyToOne(targetEntity="Walva\AdSiteBundle\Entity\Format")
     */
    private $format;

    function __toString()
    {
        return $this->getName();
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
     * Set website
     *
     * @param string $website
     * @return Space
     */
    public function setWebsite($website)
    {
        $this->website = $website;
    
        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Space
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
     * @return Space
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
}
