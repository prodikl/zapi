<?php
/**
 * Created by PhpStorm.
 * User: family
 * Date: 8/30/2017
 * Time: 11:38 PM
 */

namespace Zapi;

class Application extends \Silex\Application
{
    /** @var Routes         The Routes instance */
    private $routes;

    /**
     * Application constructor.
     *
     * @param Routes    $routes         A Route object that defines routes
     * @param array     $values         Additional data to set to this Application
     */
    public function __construct(Routes $routes, array $values = []){
        parent::__construct($values);

        $this->routes = $routes;

        $this->addRoutes();
    }

    private function addRoutes() {
        foreach($this->routes->getRoutes() as $route){
            $this->{$route->method}($route->route, $route->to);
        }
    }
}