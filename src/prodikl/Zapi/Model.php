<?php
/**
 * Created by PhpStorm.
 * User: family
 * Date: 8/30/2017
 * Time: 11:40 PM
 */

namespace prodikl\Zapi;

abstract class Model extends \Illuminate\Database\Eloquent\Model {
    /**
     * Method must return a ModelConfig
     *
     * @return ModelConfig
     */
    abstract public function config() : ModelConfig;

    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
        $this->table = $this->config()->table;

    }
}