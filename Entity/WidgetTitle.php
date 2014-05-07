<?php
namespace Victoire\TitleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Victoire\Bundle\CoreBundle\Entity\Widget;
use Victoire\TextBundle\Entity\WidgetText;

/**
 * WidgetTitle
 *
 * @ORM\Table("cms_widget_title")
 * @ORM\Entity
 */
class WidgetTitle extends WidgetText
{
    use \Victoire\Bundle\CoreBundle\Entity\Traits\WidgetTrait;
}
