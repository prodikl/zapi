<?php
/**
 * Created by PhpStorm.
 * User: family
 * Date: 8/31/2017
 * Time: 12:23 AM
 */

require("../vendor/autoload.php");

$routes = new Routes();
$app = new \Zapi\Application($routes);
$app->run();