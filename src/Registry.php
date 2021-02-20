<?php

declare(strict_types=1);

namespace Atomastic\Registry;

use Atomastic\Arrays\Arrays;
use Exception;

class Registry extends Arrays
{
    /**
     * Registry instance
     */
    private static ?Registry $instance = null;

    /**
     * Registry storage
     */
    private static ?Arrays $storage = null;

    /**
     * Gets the instance via lazy initialization (created on first usage)
     */
    public static function getInstance(): Registry
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        if (static::$storage === null) {
            static::$storage = new Arrays();
        }

        return static::$instance;
    }

    /**
     * Is not allowed to call from outside to prevent from creating multiple instances,
     * to use the Registry, you have to obtain the instance from Registry::getInstance() instead.
     */
    protected function __construct()
    {
    }

    /**
     * Prevent the instance from being cloned (which would create a second instance of it)
     */
    protected function __clone()
    {
    }

    /**
     * Prevent from being unserialized (which would create a second instance of it)
     */
    public function __wakeup(): void
    {
        throw new Exception('Cannot unserialize a Registry.');
    }
}
