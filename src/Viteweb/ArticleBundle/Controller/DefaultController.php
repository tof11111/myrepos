<?php

namespace Viteweb\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Viteweb\ArticleBundle\Entity\Article;
use Viteweb\ArticleBundle\Form\ArticleType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        
        $article=new Article();
        $form=$this->createForm(new ArticleType(),$article);
        if($this->getRequest()->getMethod()=="POST"){
            $form->submit($this->getRequest());
            if($form->isValid()){
                $em=$this->getDoctrine()->getManager();
                $em->persist($article);
                $em->flush();
                echo 'ok';
            }
        }
        echo $this->container->get("viteweb_article.calendar")->getCalendar();
        return $this->render('VitewebArticleBundle:Default:index.html.twig', array('form'=>$form->createView()));
    }
}
