<?php

namespace LiLinen\Extensions\Traits;

use LiLinen\Extensions\Exception\MethodNotFoundException;
use function forward_static_call_array;

trait StaticExtensionTrait
{
    /**
     * @var callable[]
     */
    private static $staticExtensions = [];

    /**
     * @param string $name
     * @param callable $extension
     *
     * @return void
     */
    public static function extendStatic(string $name, callable $extension): void
    {
        static::$staticExtensions[$name] = $extension;
    }

    /**
     * @param $name
     * @param $arguments
     *
     * @throws MethodNotFoundException
     */
    public static function __callStatic($name, $arguments)
    {
        if (isset(static::$staticExtensions[$name]) === false) {
            throw new MethodNotFoundException();
        }

        forward_static_call_array(self::$staticExtensions[$name], $arguments);
    }
}
