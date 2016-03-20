<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'T3Monitor.' . $extKey,
            'T3monitor',
            'T3 Monitor'
        );

        if (TYPO3_MODE === 'BE') {

            \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
                'T3Monitor.' . $extKey,
                'tools',	 // Make module a submodule of 'tools'
                't3monitor',	// Submodule key
                '',						// Position
                [
                    'Statistic' => 'index,client,clientByVersion,administration',
                    'Sla' => 'list, show',
                    'Client' => 'list, show',
                ],
                [
                    'access' => 'user,group',
                    'icon'   => 'EXT:' . $extKey . '/Resources/Public/Icons/module.svg',
                    'labels' => 'LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_t3monitor.xlf',
                ]
            );

        }

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', 'Monitioring for TYPO3 installations');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_t3monitoring_domain_model_client', 'EXT:t3monitoring/Resources/Private/Language/locallang_csh_tx_t3monitoring_domain_model_client.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_t3monitoring_domain_model_client');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_t3monitoring_domain_model_extension', 'EXT:t3monitoring/Resources/Private/Language/locallang_csh_tx_t3monitoring_domain_model_extension.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_t3monitoring_domain_model_extension');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_t3monitoring_domain_model_core', 'EXT:t3monitoring/Resources/Private/Language/locallang_csh_tx_t3monitoring_domain_model_core.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_t3monitoring_domain_model_core');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_t3monitoring_domain_model_sla', 'EXT:t3monitoring/Resources/Private/Language/locallang_csh_tx_t3monitoring_domain_model_sla.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_t3monitoring_domain_model_sla');

    },
    $_EXTKEY
);
