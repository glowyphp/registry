<h1 align="center">Registry Component</h1>

<p align="center">
<a href="https://github.com/atomastic/registry/releases"><img alt="Version" src="https://img.shields.io/github/release/atomastic/registry.svg?label=version&color=green"></a> <a href="https://github.com/atomastic/registry"><img src="https://img.shields.io/badge/license-MIT-blue.svg?color=green" alt="License"></a> <a href="https://github.com/atomastic/registry"><img src="https://img.shields.io/github/downloads/atomastic/registry/total.svg?color=green" alt="Total downloads"></a> <img src="https://github.com/atomastic/registry/workflows/Static%20Analysis/badge.svg?branch=dev"> <img src="https://github.com/atomastic/registry/workflows/Tests/badge.svg">
  <a href="https://app.codacy.com/gh/atomastic/registry?utm_source=github.com&utm_medium=referral&utm_content=atomastic/registry&utm_campaign=Badge_Grade_Dashboard"><img src="https://api.codacy.com/project/badge/Grade/72b4dc84c20145e1b77dc0004a3c8e3d"></a>
</p>

<br>

* [Installation](#installation)
* [Usage](#usage)
* [Methods](#methods)
* [Tests](#tests)
* [License](#license)

### Installation

#### With [Composer](https://getcomposer.org)

```
composer require atomastic/registry
```

### Usage

```php
use Atomastic\Registry\Registry;

// Using public method __construct()
$registry = new Registry();

// Using public static method create()
$registry = Registry::create();

// Using global helper function registry()
$registry = registry();
```

### Methods

| Method | Description |
|---|---|
| <a href="#registry_create">`create()`</a> | Create a new registry object from the given elements. Initializes a Registry object and assigns $items the supplied values. |
| <a href="#registry_set">`set()`</a> | Set an array item to a given value using "dot" notation. If no key is given to the method, the entire array will be replaced. |
| <a href="#registry_get">`get()`</a> | Get an item from an array using "dot" notation. |
| <a href="#registry_has">`has()`</a> | Checks if the given dot-notated key exists in the array. |
| <a href="#registry_delete">`delete()`</a> | Deletes an array value using "dot notation".|
| <a href="#registry_all">`all()`</a> | Get all items from stored array. |
| <a href="#registry_flush">`flush()`</a> | Flush all values from the array. |

#### Methods Details

##### <a name="registry_create"></a> Method: `create()`

```php
/**
 * Create a new arrayable object from the given elements.
 *
 * Initializes a Registry object and assigns $items the supplied values.
 *
 * @param mixed $items Elements
 */
public static function create(array $items = []): Registry
```

**Examples**

```php
$registry = Registry::create([
                        'movies' => [
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ]
                        ]
                    ]);
```

##### <a name="registry_set"></a> Method: `set()`

```php
/**
 * Set an array item to a given value using "dot" notation.
 *
 * If no key is given to the method, the entire array will be replaced.
 *
 * @param  string $key   Key
 * @param  mixed  $value Value
 */
public function set(string $key, $value): self
```

**Examples**

```php
$registry->set('movies.the-thin-red-line.title', 'The Thin Red Line');
```

##### <a name="registry_get"></a> Method: `get()`

```php
/**
 * Get an item from an array using "dot" notation.
 *
 * @param  string|int|null $key     Key
 * @param  mixed           $default Default
 */
public function get($key, $default = null)
```

**Examples**

```php
$registry->set('movies.the-thin-red-line.title', 'The Thin Red Line');
```

##### <a name="registry_has"></a> Method: `has()`

```php
/**
 * Checks if the given dot-notated key exists in the array.
 *
 * @param  string|array $keys Keys
 */
public function has($keys): bool
```

**Examples**

```php
if ($registry->has('movies.the-thin-red-line')) {
    // Do something...
}
```

##### <a name="registry_delete"></a> Method: `delete()`

```php
/**
 * Deletes an array value using "dot notation".
 *
 * @param  array|string $keys Keys
 */
public function delete($keys): self
```

**Examples**

```php
$registry->delete('movies.the-thin-red-line');
```

##### <a name="registry_dot"></a> Method: `dot()`

```php
/**
 * Flatten a multi-dimensional associative array with dots.
 *
 * @param  string $prepend Prepend string
 */
public function dot(string $prepend = ''): self
```

**Examples**

```php
$registry->dot();
```

##### <a name="registry_undot"></a> Method: `undot()`

```php
/**
 * Expands a dot notation array into a full multi-dimensional array.
 */
public function undot(): self
```

**Examples**

```php
$registry->undot();
```

##### <a name="registry_all"></a> Method: `all()`

```php
/**
 *  Get all items from stored array.
 */
public function all(): array
```

**Examples**

```php
foreach ($registry->all() as $key => $value) {
    // code...
}
```

##### <a name="registry_flush"></a> Method: `flush()`

```php
/**
 * Flush all values from the array.
 */
public function flush(): void
```

**Examples**

```php
$registry->flush();
```

##### <a name="registry_sortAssoc"></a> Method: `sortAssoc()`

```php
/**
 * Sorts a multi-dimensional associative array by a certain field.
 *
 * @param  string $field      The name of the field path
 * @param  string $direction  Order type DESC (descending) or ASC (ascending)
 * @param  const  $sort_flags A PHP sort method flags.
 */
public function sortAssoc(string $field, string $direction = 'ASC', $sort_flags = SORT_REGULAR): self
```

**Examples**

```php
$result = Registry::create([1 => ['title' => 'Post 2'],
                          0 => ['title' => 'Post 1']])->sortAssoc('title', 'ASC')->all();

$result = Registry::create([1 => ['title' => 'Post 2'],
                          0 => ['title' => 'Post 1']])->sortAssoc('title', 'DESC')->all();
```

##### <a name="registry_count"></a> Method: `count()`

```php
/**
 * Return the number of items in a given key.
 *
 * @param  int|string|null $key
 */
public function count($key = null): int
```

**Examples**

```php
$result = Registry::create(['Jack', 'Daniel', 'Sam'])->count();

$result = Registry::create(['names' => ['Jack', 'Daniel', 'Sam']])->count();

$result = Registry::create(['names' => ['Jack', 'Daniel', 'Sam'],
                          'tags' => ['star', 'movie']])->count('tags');

$result = Registry::create(['collection' => ['names' => ['Jack', 'Daniel', 'Sam'],
                                           'tags' => ['star', 'movie']]])->count('collection.tags');
```

### Tests

Run tests

```
./vendor/bin/pest
```

### License
[The MIT License (MIT)](https://github.com/atomastic/registry/blob/master/LICENSE.txt)
Copyright (c) 2020 [Sergey Romanenko](https://github.com/Awilum)
