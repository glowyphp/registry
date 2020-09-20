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
    private function __wakeup()
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
     * Checks if the given dot-notated key exists in the array.
     *
     * @param  string|array $keys Keys
     */
    public function has($keys): bool
    {

    }

    /**
     * Get an item from an array using "dot" notation.
     *
     * @param  string|int|null $key     Key
     * @param  mixed           $default Default
     */
    public function get($key, $default = null)
    {

    }

    /**
     * Deletes an array value using "dot notation".
     *
     * @param  array|string $keys Keys
     */
    public function delete($keys): self
    {

    }

    /**
     * Flush all values from the array.
     */
    public function flush(): void
    {
        $this->data = [];
    }

    /**
     *  Get all items from stored array.
     */
    public function all(): array
    {
        return $this->data;
    }
}
