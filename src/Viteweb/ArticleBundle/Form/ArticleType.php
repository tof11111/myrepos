<?php

namespace Viteweb\ArticleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArticleType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name','text')
            ->add('slib','text')
            ->add('llib','textarea')
            ->add('state','checkbox')
            ->add('cat','entity',array('class'=>'VitewebArticleBundle:Categorie',
                'property'=>'name',
                'multiple'=>false
                ))
            ->add('attributs','entity',array('class'=>'VitewebArticleBundle:Attribut',
                'property'=>'name',
                'multiple'=>true,
                'expanded'=>true,
                'query_builder' =>function(\Viteweb\ArticleBundle\Entity\AttributRepository $r) {
                        return $r->getValidAttribute();
                    }
                ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Viteweb\ArticleBundle\Entity\Article'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'viteweb_articlebundle_article';
    }
}
