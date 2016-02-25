<?php namespace Evdb\Cas\Config;

class ArrayCasConfig implements CasConfig
{

    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public static function create(array $data)
    {
        return new static($data);
    }

    public function getPgtUrl($url_encoded = true)
    {
        if (!isset($this->data['pgt_url'])) {
            throw new ConfigException('Pgt Url configuration not found');
        }

        return $url_encoded ? urlencode($this->data['pgt_url']) : $this->data['pgt_url'];
    }

    public function getService($url_encoded = true)
    {
        if (!isset($this->data['service'])) {
            throw new ConfigException('Service configuration not found');
        }

        return $url_encoded ? urlencode($this->data['service']) : $this->data['service'];
    }

    public function getUrl()
    {
        return sprintf('%s://%s/%s', $this->getProtocol(), $this->getHost(), $this->getContext());
    }

    public function getHost()
    {
        if (!isset($this->data['host'])) {
            throw new ConfigException('Host configuration not found');
        }

        return $this->data['host'];
    }

    public function getProtocol()
    {
        if (!isset($this->data['protocol'])) {
            throw new ConfigException('Protocol configuration not found');
        }

        return $this->data['protocol'];
    }

    public function getContext()
    {
        if (!isset($this->data['context'])) {
            throw new ConfigException('Context configuration not found');
        }

        return $this->data['context'];
    }

}