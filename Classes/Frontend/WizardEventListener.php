<?php

declare(strict_types=1);

namespace Fab\RssDisplay\Frontend;

use TYPO3\CMS\Backend\Controller\Event\ModifyNewContentElementWizardItemsEvent;

final readonly class WizardEventListener {

    public function __invoke(
        ModifyNewContentElementWizardItemsEvent $event
    ): void
    {
        $title = $this->getLanguageService()->sL('LLL:EXT:rss_display/Resources/Private/Language/locallang.xlf:wizard.title');
        $description = $this->getLanguageService()->sL('LLL:EXT:rss_display/Resources/Private/Language/locallang.xlf:wizard.description');
        // Add a new wizard item after "textpic"
        $event->setWizardItem(
            'rss_wizard',
            [
                'iconIdentifier' => 'content-widget-rss', 
                'title' => $title,
                'description' => $description,
                'saveAndClose' => false,
                'tt_content_defValues' => [
                    'CType' => 'list',
                    'list_type' => 'rssdisplay_pi1'
                ],
                'params' => '&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=rssdisplay_pi1'
            ],
        );
    }

    /**
     * @return \TYPO3\CMS\Core\Localization\LanguageService
     */
    protected function getLanguageService(): \TYPO3\CMS\Core\Localization\LanguageService
    {
        return $GLOBALS['LANG'];
    }
}