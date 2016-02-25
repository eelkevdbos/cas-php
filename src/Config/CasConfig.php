<?php namespace Evdb\Cas\Config;

interface CasConfig
{

    /**
     * Example: http://yourapp.com/cas/pgt
     * (pgt = proxy granting ticket)
     *
     * @param bool $url_encoded
     *
     * @return string
     */
    public function getPgtUrl($url_encoded = true);

    /**
     * Example: http://yourapp.com
     *
     * @param bool $url_encoded
     *
     * @return string
     */
    public function getService($url_encoded = true);

    /**
     * Example: https://login.hro.nl/v1
     *
     * @return string
     */
    public function getUrl();

    /**
     * Example: https
     *
     * @return string
     */
    public function getProtocol();

    /**
     * Example: login.hro.nl
     *
     * @return string
     */
    public function getHost();

    /**
     * Example: v1
     *
     * @return string
     */
    public function getContext();

}