<?php

namespace Dk\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    /**
     * @Route("/admin", name="dk_admin_dashboard")
     * @Template("DkAppBundle:Backend/Dashboard:index.html.twig")
     */
    public function indexAction()
    {
        return array();
    }
}