<?php
/**
 * Created by PhpStorm.
 * User: family
 * Date: 8/31/2017
 * Time: 12:28 AM
 */

namespace prodikl\Zapi;

if(!defined("METHOD_GET")) define("METHOD_GET", "get");
if(!defined("METHOD_POST")) define("METHOD_POST", "post");
if(!defined("METHOD_PUT")) define("METHOD_PUT", "put");

/**
 * Class Route
 *
 * @package prodikl\Zapi
 */
class Route
{
    /** @var string         The route */
    public $route;
    /** @var string         The method. Should be a METHOD_ const. */
    public $method;
    /** @var string         The TO of the Route. Typically a Controller::class pair.  */
    public $to;

    /**
     * Route constructor.
     *
     * @param string $method                        The HTTP method for this route. Should be a METHOD_ const
     * @param string $route                         The route path. Can use {curlyBraces} to denote attributes / method params
     * @param string $controllerClassName           The fully qualified Controller class name. Recommended to use Controller::class
     * @param string $controllerMethod              The method on the Controller to call
     *
     * @internal param string $to The TO of the Route. Typically a Controller::class pair.
     *
     * @see      https://silex.symfony.com/doc/2.0/usage.html        See for Route syntax
     */
    public function __construct(string $method, string $route, string $controllerClassName, string $controllerMethod){
        $this->method = $method;
        $this->route = $route;
        $this->to = $controllerClassName . '::' . $controllerMethod;
    }
}