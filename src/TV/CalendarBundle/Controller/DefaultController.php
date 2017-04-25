<?php

namespace TV\CalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TVCalendarBundle:Default:index.html.twig');
    }
}
