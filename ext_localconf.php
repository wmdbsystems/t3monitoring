<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function ($extKey) {
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\T3Monitor\T3monitoring\Domain\TypeConverter\ClientFilterDemandConverter::class);

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'T3Monitor.' . $extKey,
            'T3monitor',
            [
                'Client' => 'list, show',
                'Extension' => 'list, show',
                'Core' => 'list, show',
                'Sla' => 'list, show',

            ],
            // non-cacheable actions
            [
                'Client' => '',
                'Extension' => '',
                'Core' => '',
                'Sla' => '',

            ]
        );

        $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbBackend::class] = array(
            'className' => \T3Monitor\T3monitoring\Xclass\Typo3DbBackendXclassed::class,
        );

        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['extbase']['commandControllers'][] = \T3Monitor\Command\MonitoringCommandController::class;

    },
    $_EXTKEY
);
