<?php namespace Evdb\Cas\Request;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;

class GuzzleCasRequestClient implements CasRequestClient
{

    /**
     * @var ClientInterface
     */
    protected $guzzle;

    /**
     * GuzzleCasRequestClient constructor.
     * @param ClientInterface $guzzle
     */
    public function __construct(ClientInterface $guzzle)
    {
        $this->guzzle = $guzzle;
    }

    /**
     * @param array $config
     * @return static
     */
    public static function create($config = [])
    {
        return new static(new Client($config));
    }

    /**
     * @param $method
     * @param $uri
     * @param array $headers
     * @param null $body
     * @param string $protocolVersion
     * @return Request
     */
    public function createRequest($method, $uri, $headers = [], $body = null, $protocolVersion = '1.1')
    {
        return new Request($method, $uri, $headers, $body, $protocolVersion);
    }

    /**
     * @param RequestInterface $request
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function sendRequest(RequestInterface $request)
    {
        return $this->guzzle->send($request);
    }

}