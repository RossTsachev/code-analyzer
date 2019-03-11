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
            base_path() . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'bin' . DIRECTORY_SEPARATOR . 'phpunit',
            '--coverage-html',
            base_path() . DIRECTORY_SEPARATOR . 'reports' . DIRECTORY_SEPARATOR . 'phpunit',
        ],
        [
            base_path() . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'bin' . DIRECTORY_SEPARATOR . 'pdepend',
            '--summary-xml=' . base_path() . DIRECTORY_SEPARATOR . 'reports' . DIRECTORY_SEPARATOR . 'pdepend' . DIRECTORY_SEPARATOR . 'summary.xml',
            '--jdepend-chart=' . base_path() . DIRECTORY_SEPARATOR . 'reports' . DIRECTORY_SEPARATOR . 'pdepend' . DIRECTORY_SEPARATOR . 'jdepend.svg',
            '--overview-pyramid=' . base_path() . DIRECTORY_SEPARATOR . 'reports' . DIRECTORY_SEPARATOR . 'pdepend' . DIRECTORY_SEPARATOR . 'pyramid.svg',
            base_path() . DIRECTORY_SEPARATOR . 'domain',
        ],
        [
            base_path() . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'bin' . DIRECTORY_SEPARATOR . 'phpmd',
            base_path() . DIRECTORY_SEPARATOR . 'domain',
            'html',
            'cleancode,codesize,controversial,design,naming,unusedcode',
            '--reportfile',
            base_path() . DIRECTORY_SEPARATOR . 'reports' . DIRECTORY_SEPARATOR . 'phpmd' . DIRECTORY_SEPARATOR . 'report.html',
        ],
        [
            base_path() . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'bin' . DIRECTORY_SEPARATOR . 'phpcs',
            '--standard=PSR1,PSR2',
            '--report-file=' . base_path() . DIRECTORY_SEPARATOR . 'reports' . DIRECTORY_SEPARATOR . 'phpcs' . DIRECTORY_SEPARATOR . 'report.txt',
            base_path() . DIRECTORY_SEPARATOR . 'domain',
        ],
        [
            'vendor' . DIRECTORY_SEPARATOR . 'bin' . DIRECTORY_SEPARATOR . 'phpcpd',
            '--log-pmd=' . base_path() . DIRECTORY_SEPARATOR . 'reports' . DIRECTORY_SEPARATOR . 'phpcpd' . DIRECTORY_SEPARATOR . 'report.xml',
            base_path() . DIRECTORY_SEPARATOR . 'domain',
        ],
    ],
];
