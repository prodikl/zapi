<?php

/**
 * Created by PhpStorm.
 * User: family
 * Date: 8/31/2017
 * Time: 12:37 AM
 */
class Routes extends \Zapi\Routes {

    /**
     * Must return an array of \Zapi\Route objects
     */
    public function routes(): array
    {
        return [
            new \Zapi\Route(METHOD_GET, "posts")
        ];
    }
}