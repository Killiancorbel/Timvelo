<?php

namespace TV\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TVCoreBundle:Default:index.html.twig');
    }
}
