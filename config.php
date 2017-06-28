<?php
/**
 * Config of project
 */

$config = [
    'router' => [
        'siteUrl' => $_SERVER['HTTP_HOST'],
        'baseController' => 'Main',
        'baseAction' => 'Index',],
    'db' => [
        'params' => 'mysql:host=localhost;dbname=cw.loc;charset=utf8',
        'user' => 'root',
        'pass' => ''
    ],
    'dir' => [
        'migrations' => 'app\migrations'
    ],
    'key' =>[]
];