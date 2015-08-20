<?php

namespace Victoire\Widget\TitleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Victoire\Widget\TextBundle\Entity\WidgetText;

/**
 * WidgetText
 *
 * @ORM\Table("vic_widget_title")
 * @ORM\Entity
 */
class WidgetTitle extends WidgetText
{

    /**
     * @var string
     *
     * @ORM\Column(name="headingLevel", type="string", length=255)
     */
    protected $headingLevel;

    /**
     * @var string
     *
     * @ORM\Column(name="headingStyle", type="string", length=255, nullable=true)
     */
    protected $headingStyle;

    /**
     * To String function
     * Used in render choices type (Especially in VictoireThemeRenderBundle)
     *
     * @return String
     */
    public function __toString()
    {
        return 'Titre #'.$this->id. ' - '.$this->getContent();
    }

    /**
     * Set headingLevel
     * @param string $headingLevel The value to set to headingLevel
     *
     * @return headingLevel
     */
    public function setHeadinglevel($headingLevel)
    {
        $this->headingLevel = $headingLevel;

        return $this;
    }

    /**
     * Get headingLevel
     *
     * @return string The headingLevel value
     */
    public function getHeadinglevel()
    {
        return $this->headingLevel;
    }

    /**
     * Set headingStyle
     * @param string $headingStyle The value to set to headingStyle
     *
     * @return WidgetTitle
     */
    public function setHeadingstyle($headingStyle)
    {
        $this->headingStyle = $headingStyle;

        return $this;
    }

    /**
     * Get headingStyle
     *
     * @return string The headingStyle value
     */
    public function getHeadingstyle()
    {
        return $this->headingStyle;
    }
}
