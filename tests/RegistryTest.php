<?php

declare(strict_types = 1);

use Atomastic\Registry\Registry;

test('test getInstance() method', function() {
    $this->assertInstanceOf(Registry::class, Registry::getInstance());
});

test('test registry() helper', function() {
    $this->assertEquals(Registry::getInstance(), registry());
    $this->assertInstanceOf(Registry::class, registry());
});

test('test registry uniqueness', function() {
    $firstCall = Registry::getInstance();
    $secondCall = Registry::getInstance();

    $this->assertInstanceOf(Registry::class, $firstCall);
    $this->assertSame($firstCall, $secondCall);
});
