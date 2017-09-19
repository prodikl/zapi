<?php
/**
 * Created by PhpStorm.
 * User: family
 * Date: 8/31/2017
 * Time: 12:23 AM
 */

use Zapi\Application;
use Zapi\Routes;

require("../vendor/autoload.php");

$routes = new Routes(
    new \Zapi\Route("get", "/debates", "")
);
$app = new Application($routes);
$app->run();