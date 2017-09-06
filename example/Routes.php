<?php
use Zapi\Route;

/**
 * Created by PhpStorm.
 * User: family
 * Date: 8/31/2017
 * Time: 12:37 AM
 */
class Routes extends \Zapi\Routes {

    /**
     * Returns an array of Route objects
     *
     * @return Route[]      Returns an array of Route objects
     */
    public function getRoutes(): array
    {
        return [
            new \Zapi\Route(METHOD_GET, "posts", "PostsController::getPosts")
        ];
    }
}