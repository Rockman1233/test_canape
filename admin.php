<b>Ya odmin</b>
<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include('config/route.php');
include('models/Main.php');
include('config/DBConnect.php');
include('controllers/Controller.php');
include('views/view.php');

$router = new Route();
$router->start();
