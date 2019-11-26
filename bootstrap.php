<?php

require __DIR__.'/vendor/autoload.php';

if (!isset($_ENV['YII_ENV'])) {
    $dotenv = Dotenv\Dotenv::create(__DIR__);
    $dotenv->load();
}

defined('YII_ENV') or define('YII_ENV', $_ENV['YII_ENV'] ?? 'dev');
defined('YII_DEBUG') or define('YII_DEBUG', $_ENV['YII_DEBUG'] ?? true);

require __DIR__.'/vendor/yiisoft/yii2/Yii.php';

Yii::setAlias('@app', __DIR__);
