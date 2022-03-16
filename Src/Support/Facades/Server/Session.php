<?php

namespace Wordpress\PluginName\Support\Facades\Server;

use Wordpress\PluginName\Helpers\ArrayValidator;

class Session
{
    /**
     * session status
     *
     * @var boolean
     */
    private bool $isStarted = false;
    
    
    public function status(): bool
    {
        return $this->isStarted;
    }

    public function start()
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            $this->isStarted = true;
            return $this->isStarted;
        }
        session_start();
        $this->isStarted = true;
        return $this->isStarted;
    }

    public function add_items(array $items): array
    {
        foreach ($items as $key => $item) {
            $_SESSION[$key] = $item;
        }
        return $_SESSION;
    }

    public function remove_items(string ...$items): bool
    {
        foreach ($items as $item) {
            unset($_SESSION[$item]);
        }
        return true;
    }

    public function get_items(string ...$keys): array
    {
        $values = [];
        $arrayValidator = new ArrayValidator($_SESSION);
        foreach ($keys  as $key) {
            if ($arrayValidator->array_keys_exists($key)) {
                $values[$key] = $_SESSION[$key];
            }
        }
        return $values;
    }

    public function add_expiration_items(array $items, int $expiration): array
    {
        foreach ($items as $key => $item) {
            $_SESSION[$key] = ['value' => $item, 'expiration' => $expiration];
        }
        return $_SESSION;
    }

    public function get_item_with_expiration($key): string
    {
        $item = $this->get_items($key);
        $time = time();
        if (!!$item) {
            $result = $item[$key]['expiration'] <=> $time;
            if (($result === 0) || ($result === -1)) {
                return 'this value is expired!';
            }
            if ($result === 1) {
                return $item[$key]['value'];
            }
        }
    }

    public function clear_expired_items(): string
    {
        $time = time();
        foreach($_SESSION as $key => $item){
            if(isset($_SESSION[$key]['expiration'])){
                $result = $_SESSION[$key]['expiration'] <=> $time;
                if (($result === 0) || ($result === -1)) {
                    $this->remove_items($key);
                }
            }
        }
        return 'session cleared from expired data';
    }

    public function get_session_data(): array
    {
        return $_SESSION;
    }

    public function clear(): bool
    {
        $_SESSION = [];
        return true;
    }

    public function end(): bool
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_destroy();
            $this->isStarted = false;
            return $this->isStarted;
        }
        $this->isStarted = false;
        return $this->isStarted;
    }
}
