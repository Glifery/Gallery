<?php

namespace Gallery\AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="vkontakte_id", type="string", nullable=true)
     */
    private $vkontakteId;

    /**
     * @return mixed
     */
    public function getVkontakteId()
    {
        return $this->vkontakteId;
    }

    /**
     * @param mixed $vkontakteId
     */
    public function setVkontakteId($vkontakteId)
    {
        $this->vkontakteId = $vkontakteId;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}