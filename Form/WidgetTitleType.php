<?php

namespace Victoire\Widget\TitleBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
                'H1'                                              => 'h1',
                'H2'                                              => 'h2',
                'H3'                                              => 'h3',
                'H4'                                              => 'h4',
                'H5'                                              => 'h5',
                'H6'                                              => 'h6',
                'widget_title.form.headingLevel.choice.undefined' => 'div',
            ],
            'label' => 'widget_title.form.headingLevel.label',
        ])
        ->add('headingStyle', ChoiceType::class, [
            'label'       => 'widget_title.form.headingStyle.label',
            'empty_value' => 'widget_title.form.headingStyle.choice.placeholder',
            'choices'     => [
                'H1'                                       => 'h1',
                'H2'                                       => 'h2',
                'H3'                                       => 'h3',
                'H4'                                       => 'h4',
                'H5'                                       => 'h5',
                'H6'                                       => 'h6',
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
