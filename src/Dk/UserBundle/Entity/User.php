<?php

namespace Dk\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Zmicier Aliakseyeu <z.aliakseyeu@gmail.com>
 * 
 * @ORM\Entity
 * @ORM\Table(name="dk_users")
 */
class User extends BaseUser
{
    /**
     * 
     */
    const ROLE_USER = 'ROLE_USER';
    
    /**
     * 
     */
    const ROLE_ADMIN = 'ROLE_ADMIN';

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}