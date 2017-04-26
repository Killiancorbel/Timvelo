<?php

namespace TV\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TV\CoreBundle\Entity\Profile;
use TV\CoreBundle\Form\ProfileType;
use TV\CoreBundle\Entity\Flag;
use TV\CoreBundle\Form\FlagType;
use TV\CoreBundle\Entity\Classification;
use TV\CoreBundle\Form\ClassificationType;
use TV\CoreBundle\Entity\Team;
use TV\CoreBundle\Form\TeamType;
use TV\CoreBundle\Entity\Rider;
use TV\CoreBundle\Form\RiderType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class AdminController extends Controller
{

    public function addProfileAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
    	$profile = new Profile();

    	$form = $this->createForm(ProfileType::class, $profile);
        $profiles = $em->getRepository('TVCoreBundle:Profile')->findAll();

    	if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            $em = $this->getDoctrine()->getManager();
    		$em->persist($profile);
    		$em->flush();
            $request->getSession()->getFlashBag()->add('info', 'The new profile has been added.');
    		return $this->redirectToRoute('tv_core_add_profile');
    	}

    	return $this->render('TVCoreBundle:Admin:addProfile.html.twig', array(
            'profiles' => $profiles,
    		'form' => $form->createView()));
    }

    public function editProfileAction(Request $request, $id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$profile = $em->getRepository('TVCoreBundle:Profile')->find($id);
        $profiles = $em->getRepository('TVCoreBundle:Profile')->findAll();


    	if ($profile == null) {
    		throw new NotFoundHttpException('This profile doesn\'t exist');
    	}

    	$form = $this->createForm(ProfileType::class, $profile);
    	if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
    		$em->flush();
    		$request->getSession()->getFlashBag()->add('info', 'Profile well edited');
    		return $this->redirectToRoute('tv_core_add_profile');
    	}

    	return $this->render('TVCoreBundle:Admin:addProfile.html.twig', array(
    		'form' => $form->createView(),
    		'profiles' => $profiles));
    }

    public function deleteProfileAction(Request $request, $id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$profile = $em->getRepository('TVCoreBundle:Profile')->find($id);

    	if ($profile == null) {
    		throw new NotFoundHttpException('Profile not found');
    	}

    	$form = $this->get('form.factory')->create();
    	if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
    		$em->remove($profile);
    		$em->flush();
    		$request->getSession()->getFlashbag()->add('info', 'Profile well deleted');
    		return $this->redirectToRoute('tv_core_profiles');
    	}

    	return $this->render('TVCoreBundle:Admin:deleteProfile.html.twig', array('form' => $form->createView(), 'profile' => $profile));
    }

    public function addFlagAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $flag = new Flag();

        $form = $this->createForm(FlagType::class, $flag);
        $flags = $em->getRepository('TVCoreBundle:Flag')->findAll();

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($flag);
            $em->flush();
            $request->getSession()->getFlashBag()->add('info', 'The new flag has been added.');
            return $this->redirectToRoute('tv_core_add_flag');
        }

        return $this->render('TVCoreBundle:Admin:addFlag.html.twig', array(
            'flags' => $flags,
            'form' => $form->createView()));
    }

    public function editFlagAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $flag = $em->getRepository('TVCoreBundle:Flag')->find($id);
        $flags = $em->getRepository('TVCoreBundle:Flag')->findAll();


        if ($flag == null) {
            throw new NotFoundHttpException('This flag doesn\'t exist');
        }

        $form = $this->createForm(FlagType::class, $profile);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->flush();
            $request->getSession()->getFlashBag()->add('info', 'Flag well edited');
            return $this->redirectToRoute('tv_core_add_flag');
        }

        return $this->render('TVCoreBundle:Admin:addFlag.html.twig', array(
            'form' => $form->createView(),
            'flags' => $flags));
    }

    public function deleteFlagAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $flag = $em->getRepository('TVCoreBundle:Flag')->find($id);

        if ($flag == null) {
            throw new NotFoundHttpException('Flag not found');
        }

        $form = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->remove($flag);
            $em->flush();
            $request->getSession()->getFlashbag()->add('info', 'Flag well deleted');
            return $this->redirectToRoute('tv_core_add_flag');
        }

        return $this->render('TVCoreBundle:Admin:deleteFlag.html.twig', array('form' => $form->createView(), 'flag' => $flag));
    }

    public function addClassificationAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $classification = new Classification();

        $form = $this->createForm(ClassificationType::class, $classification);
        $classifications = $em->getRepository('TVCoreBundle:Classification')->findAll();

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($classification);
            $em->flush();
            $request->getSession()->getFlashBag()->add('info', 'The new classification has been added.');
            return $this->redirectToRoute('tv_core_add_classification');
        }

        return $this->render('TVCoreBundle:Admin:addClassification.html.twig', array(
            'classifications' => $classifications,
            'form' => $form->createView()));
    }

    public function editClassificationAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $classification = $em->getRepository('TVCoreBundle:Classification')->find($id);
        $classifications = $em->getRepository('TVCoreBundle:Classification')->findAll();


        if ($classification == null) {
            throw new NotFoundHttpException('This classification doesn\'t exist');
        }

        $form = $this->createForm(ClassificationType::class, $classification);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->flush();
            $request->getSession()->getFlashBag()->add('info', 'Classification well edited');
            return $this->redirectToRoute('tv_core_add_classification');
        }

        return $this->render('TVCoreBundle:Admin:addClassification.html.twig', array(
            'form' => $form->createView(),
            'classifications' => $classifications));
    }

    public function addTeamAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $team = new Team();

        $form = $this->createForm(TeamType::class, $team);
        $teams = $em->getRepository('TVCoreBundle:Team')->findAll();

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($team);
            $em->flush();
            $request->getSession()->getFlashBag()->add('info', 'The new team has been added.');
            return $this->redirectToRoute('tv_core_add_team');
        }

        return $this->render('TVCoreBundle:Admin:addTeam.html.twig', array(
            'teams' => $teams,
            'form' => $form->createView()));
    }

    public function editTeamAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $team = $em->getRepository('TVCoreBundle:Team')->find($id);
        $teams = $em->getRepository('TVCoreBundle:Team')->findAll();


        if ($team == null) {
            throw new NotFoundHttpException('This team doesn\'t exist');
        }

        $form = $this->createForm(TeamType::class, $team);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->flush();
            $request->getSession()->getFlashBag()->add('info', 'Team well edited');
            return $this->redirectToRoute('tv_core_add_team');
        }

        return $this->render('TVCoreBundle:Admin:addTeam.html.twig', array(
            'form' => $form->createView(),
            'teams' => $teams));
    }

    public function addRiderAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $rider = new Rider();

        $form = $this->createForm(RiderType::class, $rider);
        $riders = $em->getRepository('TVCoreBundle:Rider')->findAll();

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($rider);
            $em->flush();
            $request->getSession()->getFlashBag()->add('info', 'The new rider has been added.');
            return $this->redirectToRoute('tv_core_add_rider');
        }

        return $this->render('TVCoreBundle:Admin:addRider.html.twig', array(
            'riders' => $riders,
            'form' => $form->createView()));
    }

    public function editRiderAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $rider = $em->getRepository('TVCoreBundle:Rider')->find($id);
        $riders = $em->getRepository('TVCoreBundle:Rider')->findAll();


        if ($rider == null) {
            throw new NotFoundHttpException('This rider doesn\'t exist');
        }

        $form = $this->createForm(RiderType::class, $rider);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->flush();
            $request->getSession()->getFlashBag()->add('info', 'Rider well edited');
            return $this->redirectToRoute('tv_core_add_rider');
        }

        return $this->render('TVCoreBundle:Admin:addRider.html.twig', array(
            'form' => $form->createView(),
            'riders' => $riders));
    } // TODO next: CSS /!\ - Keep going with result input form. Do a trello with every task to go faster then. Do all races management and then API bundle, then android app, then integrate one bundle at a time in the app.
      // TO WORK : Know better about API integration in Android code.

}
