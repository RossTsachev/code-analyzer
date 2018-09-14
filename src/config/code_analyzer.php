<?php
return [
    'reports_path' => 'reports',
    'subdirs' => [
        'phpunit',
        'pdepend',
        'phpmd',
        'phpcs',
        'phpcpd',
    ],
    'commands' => [
        [
            '.\vendor\bin\phpunit',
            '--coverage-html',
            '.\reports\phpunit',
        ],
        [
            '.\vendor\bin\pdepend',
            '--summary-xml=.\reports\pdepend\summary.xml',
            '--jdepend-chart=.\reports\pdepend\jdepend.svg',
            '--overview-pyramid=.\reports\pdepend\pyramid.svg',
            '.\domain',
        ],
        [
            '.\vendor\bin\phpmd',
            '.\domain',
            'html',
            'cleancode,codesize,controversial,design,naming,unusedcode',
            '--reportfile',
            '.\reports\phpmd\report.html',
        ],
        [
            '.\vendor\bin\phpcs',
            '--standard=PSR1,PSR2',
            '--report-file=.\reports\phpcs\report.txt',
            '.\domain',
        ],
        [
            'vendor\bin\phpcpd',
            '--log-pmd=reports\phpcpd\report.xml',
            'domain',
        ],
    ],
];
