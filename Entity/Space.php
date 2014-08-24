<?php

namespace Walva\AdSiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Walva\HafBundle\Entity\Image;

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

    /**
     * @var Image
     * @ORM\OneToOne(targetEntity="Walva\HafBundle\Entity\Image", cascade={"all"})
     */
    private $image;

    /**
     * @var SpaceExample
     * @ORM\OneToMany(targetEntity="Walva\AdSiteBundle\Entity\SpaceExample", mappedBy="space")
     */
    private $examples;

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
     * @param Format $format
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
     * @return Format
     */
    public function getFormat()
    {
        return $this->format;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
    }

    /**
     * @param \Walva\HafBundle\Entity\Image $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return \Walva\HafBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }



    /**
     * Add examples
     *
     * @param \Walva\AdSiteBundle\Entity\SpaceExample $examples
     * @return Space
     */
    public function addExample(\Walva\AdSiteBundle\Entity\SpaceExample $examples)
    {
        $this->examples[] = $examples;
    
        return $this;
    }

    /**
     * Remove examples
     *
     * @param \Walva\AdSiteBundle\Entity\SpaceExample $examples
     */
    public function removeExample(\Walva\AdSiteBundle\Entity\SpaceExample $examples)
    {
        $this->examples->removeElement($examples);
    }

    /**
     * Get examples
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getExamples()
    {
        return $this->examples;
    }
}