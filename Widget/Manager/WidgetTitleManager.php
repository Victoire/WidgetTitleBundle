<?php

namespace Victoire\TitleBundle\Widget\Manager;

use Victoire\TitleBundle\Form\WidgetTitleType;
use Victoire\TitleBundle\Entity\WidgetTitle;
use Victoire\Bundle\CoreBundle\Widget\Managers\ManagerInterface;

/**
 * CRUD operations on WidgetTitle Widget
 */
class WidgetTitleManager implements ManagerInterface
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
        $widget->setSlot($slot);

        return $widget;
    }
    /**
     * render the WidgetTitle
     * @param Widget $widget
     *
     * @return widget show
     */
    public function render($widget)
    {
        return $this->container->get('victoire_templating')->render(
            "VictoireTitleBundle::show.html.twig",
            array(
                "widget" => $widget
            )
        );
    }

    /**
     * render WidgetTitle form
     * @param Form           $form
     * @param WidgetTitle    $widget
     * @param BusinessEntity $entity
     * @return form
     */
    public function renderForm($form, $widget, $entity = null)
    {
        return $this->container->get('victoire_templating')->render(
            "VictoireTitleBundle::edit.html.twig",
            array(
                "widget" => $widget,
                'form'   => $form->createView(),
                'id'     => $widget->getId(),
                'entity' => $entity
            )
        );
    }

    /**
     * create a form with given widget
     * @param WidgetTitle $widget
     * @param string         $entityName
     * @param string         $namespace
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
     * @param string         $entity
     *
     * @return new form
     */
    public function renderNewForm($form, $widget, $slot, $page, $entity = null)
    {

        return $this->container->get('victoire_templating')->render(
            "VictoireTitleBundle::new.html.twig",
            array(
                "widget"          => $widget,
                'form'            => $form->createView(),
                "slot"            => $slot,
                "entity"          => $entity,
                "renderContainer" => true,
                "page"            => $page
            )
        );
    }

    public function getWidgetName()
    {
        return 'redactor';
    }

}
