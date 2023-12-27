<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

require_once __DIR__ . '/tools/php-cs-fixer/vendor/autoload.php';

$rules = [
    '@PER-CS' => true,
    '@PHP82Migration' => true,
    // TODO configure other rules
];

$finder = Finder::create();
$finder->files();
$finder->in(dirs: __DIR__);
$finder->exclude(dirs: ['core/vendor', 'tools', 'website/var', 'website/vendor']);
$finder->append(iterator: [__FILE__, __DIR__ . '/website/bin/console']);

$config = new Config(name: 'Quintolin coding standard');
$config->setFinder(finder: $finder);
$config->setRiskyAllowed(isRiskyAllowed: true);
$config->setRules(rules: $rules);

return $config;
