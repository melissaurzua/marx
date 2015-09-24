<?php
/**
 * Error Reporting
 */
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('short_open_tag', 'On');

/**
 * Runtime Constants
 */
define ('BASE_PATH', __DIR__ . '/');

/**
 * Loader
 */
require_once  BASE_PATH . 'library/Loader.php';
$loader = new Loader();


/**
 * App
 */
$app = Application::getInstance();

/**
 * CONFIG
 */
$config = $app->getConfig();
define('ROOT', $config->root);


/**
 * Init
 */
$app->init();


/**
 * Finish
 */
$app->run();
$app->finish();


