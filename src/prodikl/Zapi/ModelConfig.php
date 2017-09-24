<?php
/**
 * Created by PhpStorm.
 * User: family
 * Date: 8/31/2017
 * Time: 12:10 AM
 */

namespace prodikl\Zapi;


class ModelConfig
{
    public $table;
    public $properties;

    /**
     * ModelConfig constructor.
     *
     * @param string $table            The table name
     * @param array $properties        An array of /Zapi/Property objects
     */
    public function __construct(string $table, array $properties){
        $this->table = $table;
        $this->properties = $properties;
    }
}