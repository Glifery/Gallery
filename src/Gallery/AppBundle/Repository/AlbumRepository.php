<?php

namespace Gallery\AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Gallery\AppBundle\Entity\Album;

class AlbumRepository extends EntityRepository
{
    public function findPublished(Album $album = null)
    {
        $criteria = array(
            'published' => true
        );

        if ($album) {
            $criteria['parent'] = $album;
        }

        return $this->findBy($criteria, array('datetime' => 'ASC'));
    }
}