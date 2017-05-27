<?php
/**
 *
 */
/**
 * Require load file
 */
require_once __DIR__ . '/app/load.php';
/**
 * Require config file
 */
require_once __DIR__ . '/config.php';

App::execute($config);
