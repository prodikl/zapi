<?php
/**
 * Created by PhpStorm.
 * User: family
 * Date: 8/30/2017
 * Time: 11:40 PM
 */

namespace prodikl\Zapi;

use Symfony\Component\HttpFoundation\Request;

abstract class Model extends \Illuminate\Database\Eloquent\Model {
    /**
     * Method must return a ModelConfig
     *
     * @return ModelConfig
     */
    abstract public function config() : ModelConfig;


    /**
     * Create a new model instance.
     *
     * @param  array  $attributes               Attributes to set in $key => $value form.
     */
    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
        $this->table = $this->config()->table;
    }

    /**
     * Returns a new instance of this model type after setting the specified properties from the json payload.
     *
     * @param ApiRequest    $request               The request object
     * @param string[]      $properties            The array of property names
     *
     * @return static
     */
    public static function fromRequestJson(ApiRequest $request, array $properties) {
        $model = new static;
        foreach($properties as $property){
            $model->$property = $request->json->$property;
        }
        return $model;
    }
}