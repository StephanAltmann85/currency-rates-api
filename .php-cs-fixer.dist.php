<?php

$finder = PhpCsFixer\Finder::create()
    ->notPath(['src/Migrations/migration.tpl', 'Kernel.php'])
    ->in('src')
    ->in('tests');


$config = new PhpCsFixer\Config();

return $config
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR12' => true,
        '@Symfony' => true,
        'full_opening_tag' => false,
        'array_syntax' => ['syntax' => 'short'],
        'ordered_imports' => true,
        'no_unused_imports' => true,
        'no_superfluous_phpdoc_tags' => true,
        'linebreak_after_opening_tag' => true,
        'logical_operators' => true,
        'native_function_invocation' => [
            'include' => ['@compiler_optimized'],
            'scope' => 'namespaced',
        ],
        'declare_strict_types' => true
    ])
    ->setFinder($finder);
