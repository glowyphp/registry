<?php

declare(strict_types=1);

namespace Atomastic\Registry;

use Atomastic\Arrays\Arrays;

final class Registry
{
    /**
     * Registry instance
     *
     * @var Registry
     */
    private static $instance = null;

    /**
     * Registry data
     *
     * @var Arrays
     */
    private static $data = null;

    /**
     * Gets the instance via lazy initialization (created on first usage)
     */
    public static function getInstance(): Registry
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        if (static::$data === null) {
            static::$data = new Arrays();
        }

        return static::$instance;
    }

    /**
     * Is not allowed to call from outside to prevent from creating multiple instances,
     * to use the singleton, you have to obtain the instance from Singleton::getInstance() instead
     */
    private function __construct()
    {
    }

    /**
     * Prevent the instance from being cloned (which would create a second instance of it)
     */
    private function __clone()
    {
    }

    /**
     * Prevent from being unserialized (which would create a second instance of it)
     */
    private function __wakeup(): void
    {
    }

    /**
     * Set an registry data to a given value using "dot" notation.
     *
     * If no key is given to the method, the entire registry data will be replaced.
     *
     * @param  string $key   Key
     * @param  mixed  $value Value
     */
    public function set(string $key, $value): self
    {
         static::$data->set($key, $value);

         return $this;
    }

    /**
     * Determine if the registry has a value for the given name.
     *
     * @param  string|array $keys The keys of the registry item to check for existence.
     */
    public function has($keys): bool
    {
        if (static::$data->has($keys)) {
            return true;
        }

        return false;
    }

    /**
     * Get item from the registry.
     *
     * @param  string $key     The name of the item to fetch.
     * @param  mixed  $default Default value
     */
    public function get(string $key, $default = null)
    {
        return static::$data->get($key, $default);
    }

    /**
     * Delete a items from the registry.
     *
     * @param  array|string $keys Keys
     */
    public function delete($keys): self
    {
        static::$data->delete($keys);

        return $this;
    }

    /**
     * Flush all items from the registry.
     */
    public function flush(): void
    {
        static::$data = null;
    }

    /**
     * Get all items from the registry.
     */
    public function all(): array
    {
        return static::$data->all();
    }
}
