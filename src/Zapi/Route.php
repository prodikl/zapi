<?php
/**
 * Created by PhpStorm.
 * User: family
 * Date: 8/31/2017
 * Time: 12:28 AM
 */

namespace Zapi;

if(!defined("METHOD_GET")) define("METHOD_GET", "get");
if(!defined("METHOD_POST")) define("METHOD_POST", "post");
if(!defined("METHOD_PUT")) define("METHOD_PUT", "put");

class Route
{
    public $route;
    public $method;

    public function __construct($method, $route){
        $this->method = $method;
        $this->route = $route;
    }
}