<?php

namespace Viteweb\ArticleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Article
 *
 * @ORM\Entity(repositoryClass="Viteweb\ArticleBundle\Entity\ArticleRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Article
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
     * @var string
     *
     * @ORM\Column(name="slib", type="string", length=255)
     */
    private $slib;

    /**
     * @var string
     *
     * @ORM\Column(name="llib", type="text")
     */
    private $llib;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dcre", type="date")
     */
    private $dcre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dmod", type="date")
     */
    private $dmod;

    /**
     * @var boolean
     *
     * @ORM\Column(name="state", type="boolean")
     */
    private $state;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Viteweb\ArticleBundle\Entity\Categorie")
     */
    private $cat;

    /**
     *
     * @ORM\ManyToMany(targetEntity="Viteweb\ArticleBundle\Entity\Attribut")
     * @ORM\JoinTable(name="attribut_article")
     */
    private $attributs;

    /**
     *
     * @var \Symfony\Component\HttpFoundation\File\UploadedFile
     */
    private $file;
    

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
     * @return Article
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
     * Set slib
     *
     * @param string $slib
     * @return Article
     */
    public function setSlib($slib)
    {
        $this->slib = $slib;
    
        return $this;
    }

    /**
     * Get slib
     *
     * @return string 
     */
    public function getSlib()
    {
        return $this->slib;
    }

    /**
     * Set llib
     *
     * @param string $llib
     * @return Article
     */
    public function setLlib($llib)
    {
        $this->llib = $llib;
    
        return $this;
    }

    /**
     * Get llib
     *
     * @return string 
     */
    public function getLlib()
    {
        return $this->llib;
    }

    /**
     * Set dcre
     *
     * @param \DateTime $dcre
     * @return Article
     */
    public function setDcre($dcre)
    {
        $this->dcre = $dcre;
    
        return $this;
    }

    /**
     * Get dcre
     *
     * @return \DateTime 
     */
    public function getDcre()
    {
        return $this->dcre;
    }

    /**
     * Set dmod
     *
     * @param \DateTime $dmod
     * @return Article
     */
    public function setDmod($dmod)
    {
        $this->dmod = $dmod;
    
        return $this;
    }

    /**
     * Get dmod
     *
     * @return \DateTime 
     */
    public function getDmod()
    {
        return $this->dmod;
    }

    /**
     * Set state
     *
     * @param boolean $state
     * @return Article
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
     * Set cat
     *
     * @param \Viteweb\ArticleBundle\Entity\Categorie $cat
     * @return Article
     */
    public function setCat(\Viteweb\ArticleBundle\Entity\Categorie $cat = null)
    {
        $this->cat = $cat;
    
        return $this;
    }

    /**
     * Get cat
     *
     * @return \Viteweb\ArticleBundle\Entity\Categorie 
     */
    public function getCat()
    {
        return $this->cat;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->attributs = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add attributs
     *
     * @param \Viteweb\ArticleBundle\Entity\Attribut $attributs
     * @return Article
     */
    public function addAttribut(\Viteweb\ArticleBundle\Entity\Attribut $attributs)
    {
        $this->attributs[] = $attributs;
    
        return $this;
    }

    /**
     * Remove attributs
     *
     * @param \Viteweb\ArticleBundle\Entity\Attribut $attributs
     */
    public function removeAttribut(\Viteweb\ArticleBundle\Entity\Attribut $attributs)
    {
        $this->attributs->removeElement($attributs);
    }

    /**
     * Get attributs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAttributs()
    {
        return $this->attributs;
    }
    
    /**
     * 
     * @ORM\PrePersist
     */
    public function prePresist(){
        $this->dcre=new \DateTime(date("Y-m-d"));
        $this->dmod=new \DateTime(date("Y-m-d"));
        echo $this->file->move(__DIR__.'/../../../../web/upload',$this->file->getClientOriginalName());
    }
    
    public function getFile()
    {
        return $this->file;
    }
    
    public function setFile($file)
    {
        $this->file=$file;
        return $this;
    }
    
}