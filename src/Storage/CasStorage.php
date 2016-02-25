<?php namespace Evdb\Cas\Storage;

interface CasStorage
{

    public function get($key, $defaultValue = null);

    public function set($key, $value);

    public function has($key);

}