<?php

namespace Gallery\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="photo")
 */
class Photo
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Album", inversedBy="photos", cascade={"persist"})
     * @ORM\JoinColumn(name="album_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $album;

    /**
     * @ORM\Column(name="original_path", type="string", nullable=false)
     */
    private $originalPath;

    /**
     * @ORM\Column(name="upload_path", type="string", nullable=true)
     */
    private $uploadPath;

    /**
     * @ORM\Column(type="datetime", nullable=false, columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     */
    private $datetime;

    /**
     * @ORM\Column(type="boolean", nullable=false, options={"default": true})
     */
    private $published;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $exif;

    public function __construct()
    {
        $this->published = true;
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
     * Set originalPath
     *
     * @param string $originalPath
     * @return Photo
     */
    public function setOriginalPath($originalPath)
    {
        $this->originalPath = $originalPath;

        return $this;
    }

    /**
     * Get originalPath
     *
     * @return string 
     */
    public function getOriginalPath()
    {
        return $this->originalPath;
    }

    /**
     * Set uploadPath
     *
     * @param string $uploadPath
     * @return Photo
     */
    public function setUploadPath($uploadPath)
    {
        $this->uploadPath = $uploadPath;

        return $this;
    }

    /**
     * Get uploadPath
     *
     * @return string 
     */
    public function getUploadPath()
    {
        return $this->uploadPath;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     * @return Photo
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime 
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Set published
     *
     * @param boolean $published
     * @return Photo
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return boolean 
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set exif
     *
     * @param string $exif
     * @return Photo
     */
    public function setExif($exif)
    {
        $this->exif = $exif;

        return $this;
    }

    /**
     * Get exif
     *
     * @return string 
     */
    public function getExif()
    {
        return $this->exif;
    }

    /**
     * Set album
     *
     * @param \Gallery\AppBundle\Entity\Album $album
     * @return Photo
     */
    public function setAlbum(\Gallery\AppBundle\Entity\Album $album = null)
    {
        $this->album = $album;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Gallery\AppBundle\Entity\Album
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->originalPath;
    }
}