<?php

namespace Walva\AdSiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('WalvaAdSiteBundle:Default:index.html.twig', array('name' => $name));
    }
}
