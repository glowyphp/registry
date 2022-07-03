<?php

declare(strict_types=1);

namespace Glowy\Registry;

use Glowy\Registry\Registry;

if (! function_exists('registry')) {
    /**
     * Gets the instance via lazy initialization (created on first usage)
     */
    function registry(): \Glowy\Registry\Registry
    {
        return Registry::getInstance();
    }
}
