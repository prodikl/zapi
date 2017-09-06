<?php
/**
 * Created by PhpStorm.
 * User: family
 * Date: 8/30/2017
 * Time: 11:49 PM
 */

namespace Zapi;

abstract class Routes {
    /**
     * Returns an array of Route objects
     *
     * @return Route[]      An array of routes
     */
    abstract public function getRoutes() : array;
}