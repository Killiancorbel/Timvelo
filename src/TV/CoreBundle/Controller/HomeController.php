<?php

namespace TV\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TV\CoreBundle\Entity\Race;
use TV\CoreBundle\Form\RaceType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class HomeController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $races = $em->getRepository('TVCoreBundle:Race')->findBy(array(), array('date' => 'desc'));

        return $this->render('TVCoreBundle:Home:index.html.twig', array('races' => $races));
    }

    public function addRaceAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
    	$race = new Race();

        $race->setDate(new \Datetime());
    	$form = $this->createForm(RaceType::class, $race);
        $races = $em->getRepository('TVCoreBundle:Race')->findBy(array(), array('date' => 'desc'));

    	if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            $em = $this->getDoctrine()->getManager();
    		$em->persist($race);
    		$em->flush();
            $request->getSession()->getFlashBag()->add('info', 'The new race has been added.');
    		return $this->redirectToRoute('tv_core_homepage');
    	}

    	return $this->render('TVCoreBundle:Home:add.html.twig', array(
            'races' => $races,
    		'form' => $form->createView()));
    }

    public function editRaceAction(Request $request, $id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$race = $em->getRepository('TVCoreBundle:Race')->find($id);

    	if ($race == null) {
    		throw new NotFoundHttpException('This race doesn\'t exist');
    	}

    	$form = $this->createForm(RaceType::class, $race);
    	if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
    		$em->flush();
    		$request->getSession()->getFlashBag()->add('info', 'Race well edited');
    		return $this->redirectToRoute('tv_core_homepage');
    	}

    	return $this->render('TVCoreBundle:Home:add.html.twig', array(
    		'form' => $form->createView(),
    		'race' => $race));
    }

    public function deleteRaceAction(Request $request, $id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$race = $em->getRepository('TVCoreBundle:Race')->find($id);

    	if ($race == null) {
    		throw new NotFoundHttpException('Race not found');
    	}

    	$form = $this->get('form.factory')->create();
    	if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
    		$em->remove($race);
    		$em->flush();
    		$request->getSession()->getFlashbag()->add('info', 'Race well deleted');
    		return $this->redirectToRoute('tv_core_homepage');
    	}

    	return $this->render('TVCoreBundle:Home:delete.html.twig', array('form' => $form->createView(), 'race' => $race));
    }

    public function infoRaceAction(Request $request, $id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$race = $em->getRepository('TVCoreBundle:Race')->find($id);
    	if (!$race)
    		throw new BadRequestHttpException('Bad request', null, 400);

    	$results = $em->getRepository('TVCoreBundle:Result')->findBy(array('race' => $race), array('position' => 'asc'));
  		return $this->render('TVCoreBundle:Home:info.html.twig', array('race' => $race, 'results' => $results));
    }
}
