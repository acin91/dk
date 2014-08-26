<?php

namespace Dk\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * 
 */
class RootController extends Controller
{
    /**
     * @Route("/", name="dk_app_homepage")
     * @Template("DkAppBundle:Frontend/Root:home.html.twig")
     */
    public function indexAction()
    {
        return array();
    }
}