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
    const ROLE_SUPER_ADMIN = 'ROLE_SUPER_ADMIN';
    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_USER = 'ROLE_USER';

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
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

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

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function __toString()
    {
        return sprintf('%s (%s)', $this->username, $this->email);
    }

    public function getRolesList()
    {
        return array(
            self::ROLE_SUPER_ADMIN => self::ROLE_SUPER_ADMIN,
            self::ROLE_ADMIN => self::ROLE_ADMIN,
            self::ROLE_USER => self::ROLE_USER,
        );
    }
}