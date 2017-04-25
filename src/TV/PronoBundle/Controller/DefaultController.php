<?php

namespace TV\PronoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TVPronoBundle:Default:index.html.twig');
    }
}
