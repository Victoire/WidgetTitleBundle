<?php

namespace Victoire\Widget\TitleBundle\Tests\Context;

use Knp\FriendlyContexts\Context\RawMinkContext;

class WidgetContext extends RawMinkContext
{
    /**
     * @When /^I should see a "(.+)" title with class "(.+)" and text "(.+)"$/
     */
    public function iShouldSeeATitleWithClass($headingLevel, $headingClass, $text)
    {
        $page = $this->getSession()->getPage();

        $title = $page->find('xpath', sprintf(
            'descendant-or-self::%s[contains(@class, "%s") and normalize-space(.) = "%s"]',
            $headingLevel,
            $headingClass,
            $text
        ));
        if (null === $title) {
            $message = sprintf(
                'Title "%s" with level "%s" and class "%s" was not found.',
                $text,
                $headingLevel,
                $headingClass
            );
            throw new \Behat\Mink\Exception\ResponseTextException($message, $this->getSession());
        }
    }
}
