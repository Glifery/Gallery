<?php

namespace Gallery\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class GalleryController extends Controller
{
    public function indexAction()
    {
        $albumRepo = $this->get('doctrine.orm.entity_manager')->getRepository('GalleryAppBundle:Album');
        $albums = $albumRepo->findAll();

        return $this->render('GalleryAppBundle:Gallery:index.html.twig', array(
                'albums' => $albums
            ));
    }
}
