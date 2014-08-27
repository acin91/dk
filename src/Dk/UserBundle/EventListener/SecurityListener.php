<?php

namespace Dk\UserBundle\EventListener;

use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\request;

/**
 * Redirect after login depends of role
 * 
 * @author Zmicier Aliakseyeu <z.aliakseyeu@gmail.com>
 */
class SecurityListener
{
    /**
     * 
     */
    protected $router;

    /**
     * 
     */
    protected $security;
    
    /**
     * 
     */
    protected $dispatcher;
    
    /**
     * @param Router $router
     * @param SecurityContext $security
     * @param EventDispatcherInterface $dispatcher
     */
    public function __construct(Router $router, SecurityContext $security, EventDispatcherInterface $dispatcher)
    {
        $this->router = $router;
        $this->security = $security;
        $this->dispatcher = $dispatcher;
    }
    
    /**
     * @param InteractiveLoginEvent $event
     */
    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
        $this->dispatcher->addListener(KernelEvents::RESPONSE, array($this, 'onKernelResponse'));
    }

    /**
     * @param FilterResponseEvent $event
     */
    public function onKernelResponse(FilterResponseEvent $event)
    {
        switch (true) {
            case $this->security->isGranted('ROLE_ADMIN'):
                $route = 'dk_admin_dashboard';
                break;
            default:
                $route = 'dk_app_home';
        }

        $event->setResponse(new RedirectResponse($this->router->generate($route)));
    }
}