<?php return [
    'id' => '__APPLICATION__ CLI',
    'name' => getenv('APP_NAME'),
    'basePath' => dirname(__DIR__),
    'vendorPath' => dirname(__DIR__) . '/../vendor',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'bootstrap' => ['log'],
    'components' => [
        'db' => require(__DIR__ . '/com/database.php'),
    ],
    'params' => require(__DIR__ . '/params.php'),
];
