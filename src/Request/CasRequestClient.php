<?php namespace Evdb\Cas\Request;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface CasRequestClient
{

    /**
     * @param $method
     * @param $uri
     * @param array $headers
     * @param null $body
     * @return RequestInterface
     */
    public function createRequest($method, $uri, $headers = [], $body = null);

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    public function sendRequest(RequestInterface $request);
    
}