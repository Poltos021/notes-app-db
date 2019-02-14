<?php

define('ROOT_DIR', getcwd());

require_once 'library/Application.php';

$app = new Application();

echo $app->execute();