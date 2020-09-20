<?php

declare(strict_types = 1);

use Atomastic\Registry\Registry;

test('test getInstance() method', function() {
    $this->assertEquals(Registry::getInstance(), Registry::getInstance());
});

test('test registry() helper', function() {
    $this->assertEquals(Registry::getInstance(), registry());
});
