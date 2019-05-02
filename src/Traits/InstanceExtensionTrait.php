<?php

namespace LiLinen\Extensions\Traits;

use LiLinen\Extensions\Exception\MethodNotFoundException;
use function call_user_func_array;

trait InstanceExtensionTrait
{
    /**
     * @var callable[]
     */
    private $instanceExtensions = [];

    /**
     * @param string $name
     * @param callable $extension
     *
     * @return void
     */
    public function extendInstance(string $name, callable $extension): void
    {
        $this->instanceExtensions[$name] = $extension;
    }

    /**
     * @param string $name
     * @param array $arguments
     *
     * @throws MethodNotFoundException
     */
    public function __call($name, $arguments)
    {
        if (isset($this->instanceExtensions[$name]) === false) {
            throw new MethodNotFoundException();
        }

        return call_user_func_array($this->instanceExtensions[$name], $arguments);
    }
}
