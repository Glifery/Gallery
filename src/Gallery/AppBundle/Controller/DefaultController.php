<?php

namespace Gallery\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $ddd = 3;
        return $this->render('GalleryAppBundle:Default:index.html.twig', array('name' => $name));
    }

    public function testAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();
        return new Response('responce! '.(new \DateTime())->format('H:i:s d.m.Y'));
    }
}
