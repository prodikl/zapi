<?php
/**
 * Created by PhpStorm.
 * User: KeithDesktop
 * Date: 9/26/2017
 * Time: 11:10 PM
 */

namespace prodikl\Zapi;


class Error {

    public static $mock = false;

    /**
     * Handles an error by outputting the error as JSON
     *
     * @param int    $errorNumber           The error code or number
     * @param string $errorMessage          The error message
     */
    public static function handle(int $errorNumber, string $errorMessage){
        http_response_code($errorNumber);
        if(!static::$mock) header("Content-Type: application/json");
        echo json_encode([
            "errorCode" => $errorNumber,
            "errorMessage" => $errorMessage
        ]);
        die;
    }
}