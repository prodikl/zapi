<?php

/**
 * Created by PhpStorm.
 * User: family
 * Date: 8/31/2017
 * Time: 12:23 AM
 *
 * @property int $id
 * @property string $title
 */
class Post extends \Zapi\Model
{
    /**
     * Method must return a ModelConfig
     *
     * @return \Zapi\ModelConfig
     */
    public function config(): \Zapi\ModelConfig
    {
        return new \Zapi\ModelConfig("posts", [
            new \Zapi\Property("id", "id", true),
            new \Zapi\Property("title")
        ]);
    }
}