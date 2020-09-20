<?php

declare(strict_types=1);

use Atomastic\Registry\Registry;

if (! function_exists('registry')) {
    /**
     * Create a new arrayable object from the given elements.
     *
     * Initializes a Arrays object and assigns $items the supplied values.
     */
    function registry(): Registry
    {
        return Registry::getInstance();
    }
}
