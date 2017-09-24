<?php
/**
 * Created by PhpStorm.
 * User: family
 * Date: 8/31/2017
 * Time: 12:42 AM
 */

namespace prodikl\Zapi;


class Property
{
    public $column;
    public $propertyName;
    public $isPrimaryKey;

    public function __construct(string $column, string $propertyName = null, bool $isPrimaryKey = false){
        $this->column = $column;
        $this->propertyName = $propertyName ?? $column;
        $this->isPrimaryKey = $isPrimaryKey;
    }
}