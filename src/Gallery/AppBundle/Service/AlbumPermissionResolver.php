<?php

namespace Gallery\AppBundle\Service;

use Doctrine\ORM\EntityManager;
use Gallery\AppBundle\Entity\Album;
use Gallery\AppBundle\Entity\User;
use Gallery\AppBundle\Repository\AlbumRepository;

class AlbumPermissionResolver
{
    /** @var EntityManager */
    private $em;

    /** @var AlbumRepository */
    private $albumRepo;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        $this->albumRepo = $em->getRepository('GalleryAppBundle:Album');
    }

    public function getAlbumsForUser(User $user, Album $album = null)
    {
        $albums = $this->albumRepo->findPublished($album);

        //TODO: permissions by user

        return $albums;
    }
}