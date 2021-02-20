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

test('test macro() method', function (): void {
    Registry::getInstance()->set('foo', 'bar');

    Registry::macro('customMethod', function() {
        return $this->count();
    });

    $registry = Registry::getInstance();
    $this->assertEquals(1, $registry->customMethod());
});
