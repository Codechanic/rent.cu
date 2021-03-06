<?php

namespace Vibalco\ContenBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArticleType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('translations', 'a2lix_translations_gedmo', array(
                    'translatable_class' => "Vibalco\ContenBundle\Entity\Article",
                    'fields' => array(
                        'name' => array(),
                        
                        'text' => array('field_type' => 'editor',),
                    )
                ))
                ->add('image', 'file', array('image_path' => 'webPath'))
                ->add('enabled')
                ->add('menu', 'genemu_jquerychosen_choice', array(
                    'choices' => array(
                        '0' => 'NO MENU',
                        '1' => 'L',
                        '2' => 'R'
                    )
                ))
                ->add('category', 'select2', array('class' => 'Vibalco\ContenBundle\Entity\Category'))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Vibalco\ContenBundle\Entity\Article'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'vibalco_contenbundle_article';
    }

}
