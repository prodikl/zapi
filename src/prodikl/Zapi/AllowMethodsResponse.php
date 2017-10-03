<?php
/**
 * Class HalJsonResponse
 */

namespace prodikl\Zapi;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class AllowMethodsResponse
 *
 * @package Application\Utility\Response
 */
class AllowMethodsResponse extends Response {

    /**
     * AllowMethodsResponse constructor.
     *
     * @param null|string $serverOrigin             The optional server origin. Leave null to infer.
     * @param bool $originMatchingRequired          Whether or not origin matching is required. Defaults to false which allows third-party origins.
     */
    public function __construct($serverOrigin = null, $originMatchingRequired = false){
        // return response
        parent::__construct("", 200,
            [
                "Access-Control-Allow-Credentials" => "true",
                "Access-Control-Allow-Origin"      => static::getServerOrigin(null),
                "Access-Control-Allow-Methods"     => "GET, POST, PUT, DELETE, OPTIONS",
                "Access-Control-Allow-Headers"     => "Origin, X-Requested-With, Content-Type, Accept, Authorization, Access-Control-Allow-Origin",
                "Response-Type" => "AllowMethodsResponse"
            ]
        );
    }

    /**
     * Returns the origin as reported by the server.
     *
     * @param $serverOrigin         string          An optional injected serverOrigin to return
     *
     * @return string                               The origin as reported by the server
     */
    public static function getServerOrigin($serverOrigin)
    {
        if ($serverOrigin === null) {
            $serverOrigin = array_key_exists('HTTP_ORIGIN', $_SERVER) ? $_SERVER['HTTP_ORIGIN'] : null;
            if ($serverOrigin === null && array_key_exists('HTTP_HOST', $_SERVER)) {
                $serverOrigin = $_SERVER['HTTP_HOST'];
            }
        }
        return $serverOrigin;
    }
}