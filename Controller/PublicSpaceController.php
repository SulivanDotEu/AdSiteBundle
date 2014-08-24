<?php
/**
 * Created by PhpStorm.
 * User: Benjamin Ellis
 * Date: 12/08/14
 * Time: 21:11
 */

namespace Walva\AdSiteBundle\Controller;


use Doctrine\Common\Persistence\ObjectRepository;
use Gedmo\Tree\RepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * --- DISCLAIMER ---
 * USELESS jusqu'a preuve du contraire
 *
 *
 * Class PublicSpaceController
 * @package Walva\AdSiteBundle\Controller
 *
 */
class PublicSpaceController extends Controller{

    public function listAction(){
        $this->getRepository()->findAll();
    }

    /**
     * @return ObjectRepository
     */
    public function getRepository() {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('WalvaAdSiteBundle:Space');
    }

} 