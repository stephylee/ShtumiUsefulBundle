<?php

namespace Slad\UsefulBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\Exception\FormException;
use Slad\UsefulBundle\Form\DataTransformer\EntityToPropertyTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AjaxAutocompleteType extends AbstractType
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }
    
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'entity_alias' => null,
            'class' => null,
            'property' => null,
            'compound' => false,
        ));
    }

    public function getName()
    {
        return 'slad_ajax_autocomplete';
    }

    public function getParent()
    {
        return 'text';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $entities = $this->container->getParameter('slad.autocomplete_entities');

  
        $options['class'] = $entities[$options['entity_alias']]['class'];
        $options['property'] = $entities[$options['entity_alias']]['property'];


        $builder->addViewTransformer(new EntityToPropertyTransformer(
            $this->container->get('doctrine')->getManager(),
            $options['class'],
            $options['property']
        ), true);

        $builder->setAttribute('entity_alias', $options['entity_alias']);
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['entity_alias'] = $form->getConfig()->getAttribute('entity_alias');
    }

}
