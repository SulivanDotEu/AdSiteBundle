<?php
/**
 * Created by PhpStorm.
 * User: Teta
 * Date: 1/06/14
 * Time: 16:21
 */

namespace Walva\AdSiteBundle\Controller;

use Symfony\Component\BrowserKit\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Format controller.
 *
 * @Route("/")
 */
class AdvertiserController extends Controller{



    /**
     * Lists all Format entities.
     *
     * @Route("/", name="advertiser_index")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return $this->render('@WalvaAdSite/Advertiser/index.html.twig');

    }

} 