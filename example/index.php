<?php
/**
 * Created by PhpStorm.
 * User: family
 * Date: 8/31/2017
 * Time: 12:23 AM
 */

use prodikl\Zapi\Route;
use prodikl\Zapi\Routes;

require("../vendor/autoload.php");

$routes = new Routes(
    new Route("get", "/pets", "PetsController", "getPets")
);
$app = new PetStoreApplication($routes);
$app->run();