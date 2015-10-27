<?php

namespace Victoire\Widget\TitleBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Helper\ProgressHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Victoire\Widget\TitleBundle\Entity\WidgetTitle;

class LegacyTitleAlignPropertyMigratorCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    public function configure()
    {
        parent::configure();

        $this
            ->setName('victoire:legacy:titleAlignPropertyMigratorCommand')
            ->setDescription('migrate title align property to use WidgetStylize Trait property instead');
    }

    /**
     * Get all links and transform page relation into viewReference.
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var ProgressHelper $progress */
        $progress = $this->getHelperSet()->get('progress');
        $progress->setProgressCharacter('V');
        $progress->setEmptyBarCharacter('-');

        $entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');

        /** @var WidgetTitle[] $widgetTitles */
        $widgetTitles = $entityManager->getRepository('Victoire\\Widget\\TitleBundle\\Entity\\WidgetTitle')->findAll();

        $progress->start($output, count($widgetTitles));
        $counter = 0;
        foreach ($widgetTitles as $widget) {
            $progress->advance();
            if ($widget->getTextAlign() != $widget->getAlign() && $widget->getAlign() != '') {
                $widget->setTextAlign($widget->getAlign());
                $widget->setAlign('');
                $counter++;
            }
        }

        $entityManager->flush();

        $progress->finish();
        $output->writeln(sprintf('<comment>Ok, %s Title widgets migrated !</comment>', $counter));

        if (0 == $counter) {
            $output->writeln('<comment>Nothing to do...</comment>');
        }
    }
}
