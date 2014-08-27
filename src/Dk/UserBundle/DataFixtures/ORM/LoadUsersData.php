<?php

namespace Dk\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Dk\UserBundle\Entity\User;

/**
 * @author Zmicier Aliakseyeu <z.aliakseyeu@gmail.com>
 */
class LoadUsersData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $userManager = $this->container->get('fos_user.user_manager');

        $admin = $userManager->createUser();
        $admin->setUsername('admin');
        $admin->setEmail('admin@dk.local');
        $admin->setPlainPassword('123qweasdzxc');
        $admin->addRole(User::ROLE_ADMIN);
        $admin->setEnabled(true);
        $userManager->updateUser($admin);

        $this->addReference('admin-user', $admin);
    }

    public function getOrder()
    {
        return 10;
    }
}