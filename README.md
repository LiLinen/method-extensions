# Method-Extensions

Add method extensions to classes and instances. Inspired by extension methods in languages like C# or Kotlin.

__Note__: this library is only a thought exercise. __Be warned.__

## Installation
```bash
composer require lilinen/method-extensions
```

## Usage

```php
<?php

use \LiLinen\Extensions\Traits\ExtendableTrait;

class EmptyClass
{
    use ExtendableTrait;
}


// Extend Static Class Methods:
EmptyClass::extendStatic('staticHello', function () {
    return 'Hello Static!';    
});

echo EmptyClass::staticHello(); // prints "Hello Static!"


// Extend Instances:
$class = new EmptyClass();
$class->extendInstance('instanceHello', function () {
    return 'Hello Instance!';
});

echo $class->instanceHello(); // prints "Hello Instance!"


// Extend with Parameters:
$class->extendInstance('helloWithName', function (string $name) {
    return "Hello {$name}!";
});

echo $class->helloWithName('Foo'); //prints "Hello Foo!"

```


