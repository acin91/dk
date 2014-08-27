<?php

namespace Dk\AppBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @author Zmicier Aliakseyeu <z.aliakseyeu@gmail.com>
 */
class DkAppExtension extends \Twig_Extension
{

    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    private $container;
    
    /**
     * @param \Symfony\Component\DependencyInjection\ContainerInterface
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array();
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            'is_current_route' => new \Twig_Function_Method($this, 'isCurrentRoute'),
        );
    }

    /**
     * @param string $route
     * @return boolean
     */
    public function isCurrentRoute($route)
    {
        $request = $this->container->get('request');
        $currentRoute = $request->get('_route');
        if ($route == $currentRoute) {
            return true;
        }

        return false;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'dk_app';
    }
}