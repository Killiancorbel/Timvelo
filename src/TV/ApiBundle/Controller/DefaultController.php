<?php

namespace TV\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TVApiBundle:Default:index.html.twig');
    }
}
