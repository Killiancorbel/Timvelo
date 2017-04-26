<?php

namespace TV\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TV\CoreBundle\Entity\Profile;
use TV\CoreBundle\Form\ProfileType;
use TV\CoreBundle\Entity\Flag;
use TV\CoreBundle\Form\FlagType;
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

}
