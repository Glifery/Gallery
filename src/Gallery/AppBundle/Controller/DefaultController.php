<?php

namespace Gallery\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GalleryAppBundle:Default:index.html.twig', array('name' => $name));
    }
}