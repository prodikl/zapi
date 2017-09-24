<?php
/**
 * Created by PhpStorm.
 * User: KeithDesktop
 * Date: 9/24/2017
 * Time: 5:33 PM
 */

namespace prodikl\Zapi;


use Symfony\Component\HttpFoundation\Response;

/**
 * Class JsonResponse
 *
 * Wraps the response as a JSON object.
 * Calls json_encode on the content, so don't call json_encode before sending it.
 * Adds the Content-Type=application/json header by default.
 *
 * @package prodikl\Zapi
 */
class JsonResponse extends Response {
    /**
     * Constructor.
     *
     * @param mixed $content The response content, see setContent()
     * @param int   $status  The response status code
     * @param array $headers An array of response headers
     *
     * @throws \InvalidArgumentException When the HTTP status code is not valid
     */
    public function __construct($content = '', $status = 200, array $headers = array()) {
        $content = json_encode($content);
        parent::__construct($content, $status, $headers);
        $this->headers->add([
            "Content-Type" => "application/json"
        ]);
    }
}