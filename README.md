Victoire DCMS Title Bundle
============

## What is the purpose of this bundle

This bundles gives you access to the *Title & Headings Widget* which integrates titles & headings on your website.
You can define the HTML headings and the headings' style.

## Set Up Victoire

If you haven't already, you can follow the steps to set up Victoire *[here](https://github.com/Victoire/victoire/blob/master/doc/setup.md)*

## Install the bundle

Run the following composer command :

    php composer.phar require victoire/title-widget

### Reminder

Do not forget to add the bundle in your AppKernel !

    class AppKernel extends Kernel
    {
        public function registerBundles()
        {
            $bundles = array(
                ...
                new Victoire\Widget\TitleBundle\VictoireWidgetTitleBundle(),
            );

            return $bundles;
        }
    }
