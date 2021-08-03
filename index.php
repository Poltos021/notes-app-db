<?php

define('ROOT_DIR', getcwd());

require_once 'config/includes.php';
require_once 'library/Application.php';

$app = new Application();

echo $app->execute();

if(!isset($_SESSION['theme']))
{
    $_SESSION["theme"] = "";
}