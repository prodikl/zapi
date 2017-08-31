<?php
/**
 * Created by PhpStorm.
 * User: family
 * Date: 8/30/2017
 * Time: 11:40 PM
 */

namespace Zapi;

abstract class Model extends \Illuminate\Database\Eloquent\Model {
    /**
     * Method must return a ModelConfig
     *
     * @return ModelConfig
     */
    abstract public function config() : ModelConfig;
}