<?php

namespace Victoire\TitleBundle\Widget\Manager;


use Victoire\TitleBundle\Form\WidgetTitleType;
use Victoire\TitleBundle\Entity\WidgetTitle;

class WidgetTitleManager
{
protected $container;

    /**
     * constructor
     *
     * @param ServiceContainer $container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * create a new WidgetTitle
     * @param Page   $page
     * @param string $slot
     *
     * @return $widget
     */
    public function newWidget($page, $slot)
    {
        $widget = new WidgetTitle();
        $widget->setPage($page);
        $widget->setslot($slot);

        return $widget;
    }
    /**
     * render the WidgetTitle
     * @param Widget $widget
     *
     * @return widget show
     */
    public function render($widget, $page)
    {
        return $this->container->get('victoire_templating')->render(
            "VictoireTitleBundle:Widget:title/show.html.twig",
            array(
                "widget" => $widget,
                "page" => $page
            )
        );
    }

    /**
     * render WidgetTitle form
     * @param Form           $form
     * @param WidgetTitle $widget
     * @return form
     */
    public function renderForm($form, $widget)
    {

        return $this->container->get('victoire_templating')->render(
            "VictoireTitleBundle:Widget:title/edit.html.twig",
            array("widget" => $widget, 'form' => $form->createView(), 'id' => $widget->getId())
        );
    }

    /**
     * create a form with given widget
     * @param WidgetTitle $widget
     * @return $form
     */
    public function buildForm($widget, $entityName = null, $namespace = null)
    {
        $form = $this->container->get('form.factory')->create(new WidgetTitleType($entityName, $namespace), $widget);

        return $form;
    }

    /**
     * create form new for WidgetTitle
     * @param Form           $form
     * @param WidgetTitle $widget
     * @param string         $slot
     * @param Page           $page
     *
     * @return new form
     */
    public function renderNewForm($form, $widget, $slot, $page)
    {

        return $this->container->get('victoire_templating')->render(
            "VictoireTitleBundle:Widget:title/new.html.twig",
            array(
                "widget" => $widget,
                'form' => $form->createView(),
                "slot" => $slot,
                "renderContainer" => true,
                "page" => $page
            )
        );
    }
}
