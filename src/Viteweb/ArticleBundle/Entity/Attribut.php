<?php

namespace Viteweb\ArticleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attribut
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Viteweb\ArticleBundle\Entity\AttributRepository")
 */
class Attribut
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var boolean
     *
     * @ORM\Column(name="state", type="boolean")
     */
    private $state;

    /**
     * 
     * @ORM\ManyToMany(targetEntity="Viteweb\ArticleBundle\Entity\Article")
     */
    private $article;

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
     * Set name
     *
     * @param string $name
     * @return Attribut
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set state
     *
     * @param boolean $state
     * @return Attribut
     */
    public function setState($state)
    {
        $this->state = $state;
    
        return $this;
    }

    /**
     * Get state
     *
     * @return boolean 
     */
    public function getState()
    {
        return $this->state;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->article = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add article
     *
     * @param \Viteweb\ArticleBundle\Entity\Article $article
     * @return Attribut
     */
    public function addArticle(\Viteweb\ArticleBundle\Entity\Article $article)
    {
        $this->article[] = $article;
    
        return $this;
    }

    /**
     * Remove article
     *
     * @param \Viteweb\ArticleBundle\Entity\Article $article
     */
    public function removeArticle(\Viteweb\ArticleBundle\Entity\Article $article)
    {
        $this->article->removeElement($article);
    }

    /**
     * Get article
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArticle()
    {
        return $this->article;
    }
}