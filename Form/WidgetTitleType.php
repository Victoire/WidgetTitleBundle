<?php

namespace Victoire\Widget\TitleBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Victoire\Widget\TextBundle\Form\WidgetTextType;

class WidgetTitleType extends WidgetTextType
{
    /**
     * define form fields.
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('headingLevel', ChoiceType::class, [
            'choices' => [
                'h1'                                              => 'h1',
                'h2'                                              => 'h2',
                'h3'                                              => 'h3',
                'h4'                                              => 'h4',
                'h5'                                              => 'h5',
                'h6'                                              => 'h6',
                'widget_title.form.headingLevel.choice.undefined' => 'div',
            ],
            'label' => 'widget_title.form.headingLevel.label',
        ])
        ->add('headingStyle', ChoiceType::class, [
            'label'       => 'widget_title.form.headingStyle.label',
            'empty_data' => 'widget_title.form.headingStyle.choice.placeholder',
            'choices'     => [
                'h1'                                       => 'h1',
                'h2'                                       => 'h2',
                'h3'                                       => 'h3',
                'h4'                                       => 'h4',
                'h5'                                       => 'h5',
                'h6'                                       => 'h6',
                'widget_title.form.headingStyle.choice.no' => 'unstyled-heading',
            ],
        ]);
        parent::buildForm($builder, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'data_class'         => 'Victoire\Widget\TitleBundle\Entity\WidgetTitle',
            'widget'             => 'Title',
            'translation_domain' => 'victoire',
        ]);
    }
}
