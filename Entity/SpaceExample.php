<?php

namespace Walva\AdSiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SpaceExample
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class SpaceExample
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
     * @ORM\Column(name="url", type="text")
     */
    private $url;

    /**
     * @var Space
     * @ORM\ManyToOne(targetEntity="Walva\AdSiteBundle\Entity\Space", inversedBy="examples")
     */
    private $space;


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
     * Set url
     *
     * @param string $url
     * @return SpaceExample
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set space
     *
     * @param \Walva\AdSiteBundle\Entity\Space $space
     * @return SpaceExample
     */
    public function setSpace(\Walva\AdSiteBundle\Entity\Space $space = null)
    {
        $this->space = $space;
    
        return $this;
    }

    /**
     * Get space
     *
     * @return \Walva\AdSiteBundle\Entity\Space 
     */
    public function getSpace()
    {
        return $this->space;
    }
}