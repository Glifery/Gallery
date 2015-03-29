<?php

namespace Gallery\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="photo")
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="children", cascade={"persist"})
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="Category", mappedBy="parent_id", cascade={"persist"}, orphanRemoval=true)
     */
    private $children;

    /**
     * @ORM\Column(name="original_path", type="string", nullable=false)
     */
    private $originPath;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $title;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime", nullable=false, columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     */
    private $datetime;

    /**
     * @ORM\Column(type="boolean", nullable=false, options={"default": true})
     */
    private $published;

    /**
     * @ORM\OneToMany(targetEntity="Photo", mappedBy="category_id", cascade={"persist"}, orphanRemoval=true)
     */
    private $photos;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
        $this->photos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set originPath
     *
     * @param string $originPath
     * @return Category
     */
    public function setOriginPath($originPath)
    {
        $this->originPath = $originPath;

        return $this;
    }

    /**
     * Get originPath
     *
     * @return string 
     */
    public function getOriginPath()
    {
        return $this->originPath;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Category
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Category
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     * @return Category
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
     * @return Category
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
     * Set parent
     *
     * @param \Gallery\AppBundle\Entity\Category $parent
     * @return Category
     */
    public function setParent(\Gallery\AppBundle\Entity\Category $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Gallery\AppBundle\Entity\Category 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add children
     *
     * @param \Gallery\AppBundle\Entity\Category $children
     * @return Category
     */
    public function addChild(\Gallery\AppBundle\Entity\Category $children)
    {
        $this->children[] = $children;

        return $this;
    }

    /**
     * Remove children
     *
     * @param \Gallery\AppBundle\Entity\Category $children
     */
    public function removeChild(\Gallery\AppBundle\Entity\Category $children)
    {
        $this->children->removeElement($children);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Add photos
     *
     * @param \Gallery\AppBundle\Entity\Photo $photos
     * @return Category
     */
    public function addPhoto(\Gallery\AppBundle\Entity\Photo $photos)
    {
        $this->photos[] = $photos;

        return $this;
    }

    /**
     * Remove photos
     *
     * @param \Gallery\AppBundle\Entity\Photo $photos
     */
    public function removePhoto(\Gallery\AppBundle\Entity\Photo $photos)
    {
        $this->photos->removeElement($photos);
    }

    /**
     * Get photos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPhotos()
    {
        return $this->photos;
    }
}
