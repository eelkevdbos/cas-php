<?php namespace Evdb\Cas\Storage;

class SessionCasStorage implements CasStorage
{
    public function get($key, $defaultValue = null)
    {
        if (!isset($_SESSION[$key])) {
            return $defaultValue;
        }

        return $_SESSION[$key];
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function has($key)
    {
        return isset($_SESSION[$key]);
    }


}