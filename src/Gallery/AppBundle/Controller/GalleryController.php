<?php

namespace Gallery\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class GalleryController extends Controller
{
    public function indexAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();

        $albumPermissionResolver = $this->get('gallery_app.service.album_permission_resolver');
        $albums = $albumPermissionResolver->getAlbumsForUser($user);

        return $this->render('GalleryAppBundle:Gallery:index.html.twig', array(
                'albums' => $albums
            ));
    }

    public function albumsAction($parent)
    {
        $user = $this->get('security.context')->getToken()->getUser();

        $albumPermissionResolver = $this->get('gallery_app.service.album_permission_resolver');
        $albums = $albumPermissionResolver->getAlbumsForUser($user);

        return $this->render('GalleryAppBundle:Gallery:index.html.twig', array(
                'albums' => $albums
            ));
    }

    public function albumAction($parent, $child)
    {
        $user = $this->get('security.context')->getToken()->getUser();

        $albumPermissionResolver = $this->get('gallery_app.service.album_permission_resolver');
        $albums = $albumPermissionResolver->getAlbumsForUser($user);

        return $this->render('GalleryAppBundle:Gallery:index.html.twig', array(
                'albums' => $albums
            ));
    }
}
