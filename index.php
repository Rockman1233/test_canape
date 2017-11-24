<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include('config/route.php');

$router = new Route();
$router->start();

