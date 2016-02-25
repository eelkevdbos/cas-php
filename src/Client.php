<?php namespace Evdb\Cas;

use Evdb\Cas\Config\CasConfig;
use Evdb\Cas\Request\CasRequestClient;
use Evdb\Cas\Storage\CasStorage;

class Client
{

    /**
     * @var CasConfig
     */
    protected $config;

    /**
     * @var CasRequestClient
     */
    protected $client;


    /**
     * @var CasStorage
     */
    protected $storage;


    /**
     * CasAuthService constructor.
     * @param CasConfig $config
     * @param CasRequestClient $client
     * @param CasStorage $storage
     */
    public function __construct(CasConfig $config, CasRequestClient $client, CasStorage $storage)
    {
        $this->config = $config;
        $this->client = $client;
        $this->storage = $storage;
    }

    /**
     * Redirect the user to the login page of the cas service provider
     * @return void
     */
    public function login()
    {
        $url = $this->buildActionUri('login', ['service' => $this->config->getService()]);

        $this->doRedirect($url);
    }

    /**
     * Execute a service validation request
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function serviceValidate()
    {
        $params = [
            'service' => $this->config->getService(),
            'ticket' => $this->storage->get('ticket')
        ];

        $request = $this->client->createRequest('GET', $this->buildActionUri('serviceValidate', $params));

        return $this->client->sendRequest($request);
    }

    /**
     * Build an action specific url extended by some request parameters
     *
     * @param $action
     * @param array $params
     * @return string
     */
    protected function buildActionUri($action, $params = [])
    {
        reset($params);

        $paramString = array_reduce($params, function ($carry, $item) use (&$params) {
            $key = key($params);
            next($params);

            return (is_null($carry) ? '?' : ($carry . '&')) . $key . '=' . $item;
        });

        return sprintf('%s/%s%s', $this->config->getUrl(), $action, $paramString);
    }

    /**
     * Redirect helper
     *
     * @param $url
     * @param int $statusCode
     * @return void
     */
    protected function doRedirect($url, $statusCode = 301)
    {
        header('Location: ' . $url, true, $statusCode);
        exit();
    }
}