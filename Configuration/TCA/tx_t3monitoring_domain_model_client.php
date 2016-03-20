<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:t3monitoring/Resources/Private/Language/locallang_db.xlf:tx_t3monitoring_domain_model_client',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'title,domain,secret,email,php_version,mysql_version,insecure_core,outdated_core,insecure_extensions,outdated_extensions,error_message,extensions,core,sla,',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('t3monitoring') . 'Resources/Public/Icons/tx_t3monitoring_domain_model_client.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'hidden, title, domain, secret, email, php_version, mysql_version, insecure_core, outdated_core, insecure_extensions, outdated_extensions, error_message, extensions, core, sla',
    ],
    'types' => [
        '1' => [
            'showitem' => '
        --div--;General,title;;paletteDomain,email, sla,
        --div--;Readonly information,error_message,core;;paletteVersions,extensions,
        insecure_core, outdated_core, insecure_extensions, outdated_extensions'
        ],
    ],
    'palettes' => [
        'paletteDomain' => ['showitem' => 'domain, secret,hidden'],
        'paletteVersions' => ['showitem' => 'php_version, mysql_version'],
    ],
    'columns' => [

        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
            ],
        ],

        'title' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3monitoring/Resources/Private/Language/locallang_db.xlf:tx_t3monitoring_domain_model_client.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
                'max' => 255
            ],

        ],
        'domain' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3monitoring/Resources/Private/Language/locallang_db.xlf:tx_t3monitoring_domain_model_client.domain',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],

        ],
        'secret' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3monitoring/Resources/Private/Language/locallang_db.xlf:tx_t3monitoring_domain_model_client.secret',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
                'min' => 5,
                'max' => 255
            ],

        ],
        'email' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3monitoring/Resources/Private/Language/locallang_db.xlf:tx_t3monitoring_domain_model_client.email',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],

        ],
        'sla' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3monitoring/Resources/Private/Language/locallang_db.xlf:tx_t3monitoring_domain_model_client.sla',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_t3monitoring_domain_model_sla',
                'minitems' => 0,
                'maxitems' => 1,
                'items' => [
                    ['', '']
                ]
            ],
        ],
        'php_version' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3monitoring/Resources/Private/Language/locallang_db.xlf:tx_t3monitoring_domain_model_client.php_version',
            'config' => [
                'readOnly' => true,
                'type' => 'input',
                'size' => 5,
                'eval' => 'trim'
            ],

        ],
        'mysql_version' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3monitoring/Resources/Private/Language/locallang_db.xlf:tx_t3monitoring_domain_model_client.mysql_version',
            'config' => [
                'readOnly' => true,
                'type' => 'input',
                'size' => 5,
                'eval' => 'trim'
            ],

        ],
        'insecure_core' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3monitoring/Resources/Private/Language/locallang_db.xlf:tx_t3monitoring_domain_model_client.insecure_core',
            'config' => [
                'readOnly' => true,
                'type' => 'check',
                'default' => 0
            ]

        ],
        'outdated_core' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3monitoring/Resources/Private/Language/locallang_db.xlf:tx_t3monitoring_domain_model_client.insecure_extensions',
            'config' => [
                'readOnly' => true,
                'type' => 'check',
                'default' => 0
            ]

        ],
        'insecure_extensions' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3monitoring/Resources/Private/Language/locallang_db.xlf:tx_t3monitoring_domain_model_client.insecure_extensions',
            'config' => [
                'readonly' => true,
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]

        ],
        'outdated_extensions' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3monitoring/Resources/Private/Language/locallang_db.xlf:tx_t3monitoring_domain_model_client.outdated_extensions',
            'config' => [
                'readonly' => true,
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'error_message' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3monitoring/Resources/Private/Language/locallang_db.xlf:tx_t3monitoring_domain_model_client.error_message',
            'config' => [
                'readOnly' => true,
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],

        ],
        'extensions' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3monitoring/Resources/Private/Language/locallang_db.xlf:tx_t3monitoring_domain_model_client.extensions',
            'config' => [
                'readOnly' => true,
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_t3monitoring_domain_model_extension',
                'foreign_table' => 'tx_t3monitoring_domain_model_extension',
                'foreign_table_where' => 'order by tx_t3monitoring_domain_model_extension.name',
                'foreign_default_sortby' => 'order by tx_t3monitoring_domain_model_extension.name',
                'MM' => 'tx_t3monitoring_client_extension_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'wizards' => [
                    '_PADDING' => 1,
                    '_VERTICAL' => 1,
                    'edit' => [
                        'module' => [
                            'name' => 'wizard_edit',
                        ],
                        'type' => 'popup',
                        'title' => 'Edit',
                        'icon' => 'edit2.gif',
                        'popup_onlyOpenIfSelected' => 1,
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                    ],
                    'add' => [
                        'module' => [
                            'name' => 'wizard_add',
                        ],
                        'type' => 'script',
                        'title' => 'Create new',
                        'icon' => 'add.gif',
                        'params' => [
                            'table' => 'tx_t3monitoring_domain_model_extension',
                            'pid' => '###CURRENT_PID###',
                            'setValue' => 'prepend'
                        ],
                    ],
                ],
            ],

        ],
        'core' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3monitoring/Resources/Private/Language/locallang_db.xlf:tx_t3monitoring_domain_model_client.core',
            'config' => [
                'readOnly' => true,
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_t3monitoring_domain_model_core',
                'minitems' => 0,
                'maxitems' => 1,
            ],

        ],
    ],
];
