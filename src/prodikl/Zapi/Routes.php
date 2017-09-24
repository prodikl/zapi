<?php
/**
 * Created by PhpStorm.
 * User: family
 * Date: 8/30/2017
 * Time: 11:49 PM
 */

namespace prodikl\Zapi;

class Routes {

    /** @var Route[]         The Route objects */
    protected $routes;

    /**
     * Routes constructor.
     *
     * Takes Route objects as the constructor
     *
     * @param Route[] ...$routes
     */
    public function __construct(Route ...$routes){
        $this->routes = $routes;
    }

    /**
     * Returns an array of Route objects
     *
     * @return Route[]      An array of routes
     */
    public function getRoutes() : array {
        return $this->routes;
    }

}