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
class AdvertiserController extends Controller
{


    /**
     * First page when you log as an advertiser.
     *
     * @Route("/", name="advertiser_index")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {

        return $this->render('@WalvaAdSite/Advertiser/index.html.twig');
    }

    /**
     * Lists all Spaces available for adverstiser.
     *
     * @Route("/spaces", name="advertiser_spaces")
     * @Method("GET")
     * @Template()
     */
    public function listSpacesAction()
    {
        $spaces = $this->getDoctrine()->getRepository('WalvaAdSiteBundle:Space')->findAll();

        return $this->render(
            '@WalvaAdSite/Advertiser/spaces.html.twig',
            array(
                'entities' => $spaces
            )
        );
    }

    /**
     * Lists all Spaces available for adverstiser.
     *
     * @Route("/format", name="advertiser_format")
     * @Method("GET")
     * @Template()
     */
    public function listFormatsAction()
    {
        $entities = $this->getDoctrine()->getRepository('WalvaAdSiteBundle:Format')->findAll();

        return $this->render(
            '@WalvaAdSite/Advertiser/format.html.twig',
            array(
                'entities' => $entities
            )
        );
    }

}