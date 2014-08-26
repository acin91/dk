<?php

namespace Dk\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class DkUserBundle extends Bundle
{
    /**
     * {@inheritDoc}
     */
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
