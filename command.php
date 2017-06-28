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

if ($argc != 1) {
    $com = $argv[1];
    App::console($config);
    app\core\Command::execute($com);

} else {
    echo 'Please enter command ...';
}