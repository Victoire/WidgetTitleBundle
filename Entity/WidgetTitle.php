<?php
namespace Victoire\TitleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Victoire\Bundle\CoreBundle\Entity\Widget;
use Victoire\TextBundle\Entity\WidgetText;
use Victoire\Bundle\CoreBundle\Annotations as VIC;

/**
 * WidgetTitle
 *
 * @ORM\Table("cms_widget_title")
 * @ORM\Entity
 */
class WidgetTitle extends WidgetText
{
    use \Victoire\Bundle\CoreBundle\Entity\Traits\WidgetTrait;

    /**
     * @var text
     *
     * @ORM\Column(name="heading_level", type="text", nullable=true)
     * @VIC\ReceiverProperty("textable")
     */
    protected $headingLevel;

    /**
     * Set headingLevel
     *
     * @param string $headingLevel
     * @return headingLevel
     */
    public function setHeadingLevel($headingLevel)
    {
        $this->headingLevel = $headingLevel;

        return $this;
    }

    /**
     * Get headingLevel
     *
     * @return string
     */
    public function getHeadingLevel()
    {
        return $this->headingLevel;
    }
}
