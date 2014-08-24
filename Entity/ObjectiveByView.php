<?php

namespace Walva\AdSiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ObjectiveByView
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ObjectiveByView
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
