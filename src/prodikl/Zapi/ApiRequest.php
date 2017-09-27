<?php
/**
 * Created by PhpStorm.
 * User: KeithDesktop
 * Date: 9/26/2017
 * Time: 11:08 PM
 */

namespace prodikl\Zapi;

use Symfony\Component\HttpFoundation\Request;

class ApiRequest extends Request{

    /**
     * JSON payload parameters.
     *
     * @var object|array
     */
    public $json;

    /** @const string The Content-Type key in the headers bag */
    const HEADER_CONTENT_TYPE = 'Content-Type';

    /** @const string The application/json accept type */
    const HEADER_ACCEPT_APPLICATION_JSON = "application/json";

    /**
     * Initializes the Request. This is called in the Request contructor method.
     * This method also parses the body content if it is JSON
     *
     * @param array $query
     * @param array $request
     * @param array $attributes
     * @param array $cookies
     * @param array $files
     * @param array $server
     * @param null  $content
     */
    public function initialize(array $query = array(), array $request = array(), array $attributes = array(), array $cookies = array(), array $files = array(), array $server = array(), $content = null) {
        parent::initialize($query, $request, $attributes, $cookies, $files, $server, $content);
        $this->parseJsonBody($this->getContent());
    }

    /**
     * Parses and sets this JSON using the content body
     *
     * @param      $content      string          The raw body payload
     * @param bool $failOnError                  Whether failures should immediately result in an error shown to the user.
     */
    public function parseJsonBody($content, $failOnError = true) {
        if(strpos($this->headers->get(self::HEADER_CONTENT_TYPE), self::HEADER_ACCEPT_APPLICATION_JSON) === 0){
            $this->json = $this->getJsonContent($content, $failOnError);
        } else {
            $this->json = (object) [];
        }
    }

    /**
     * Returns a JSON (stdClass) representation of the content
     *
     * @param      $content          string          The content to parse
     * @param bool $failOnError                      Whether failures should be immediately shown to the user.
     *
     * @return object The JSON representation
     */
    private function getJsonContent($content, $failOnError = true) {
        $jsonContent = json_decode($content);
        if($jsonContent === null && $failOnError) Error::handle(400, "The body is not valid JSON.");
        return $jsonContent;
    }
}