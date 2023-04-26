<?php

namespace Container;

use AppDIC\DIC\Enums\ServiceKeys as KEYS;
use AppDIC\DIC\Exceptions\ContainerException;
use AppDIC\DIC\Exceptions\NotFoundException;
use Psr\Container\ContainerInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class Container implements ContainerInterface
{
    public array $services = [];
    public array $store = [];

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->store = array_merge($config);
        $this->createServices($this->store);
    }

    /**
     * @inheritDoc
     */
    public function get(string $id): mixed
    {
        if (!isset($this->services[$id]))
            throw new NotFoundException("Service \"$id\" not found in container");
        return $this->services[$id];
    }

    /**
     * @inheritDoc
     */
    public function has(string $id): bool
    {
        return in_array($id, array_keys($this->services));
    }

    public function createServices(array $store)
    {
        foreach ($store as $key => $item) {
            $isClass = isset($item[KEYS::CLASSNAME]);
            if ($isClass) {
                $this->createClass($key, $item);
            } else {
                $this->createElement($key, $item);
            }
        }
    }

    protected function createClass($key, $item)
    {
        $hasArguments = !empty($item[KEYS::ARGUMENTS]);
        if ($hasArguments) {
            return $this->createClassWithArguments($key, $item);
        } else {
            return $this->createClassWithoutArguments($key, $item);
        }
    }

    protected function createClassWithoutArguments($key, $item)
    {
        $className = $item[KEYS::CLASSNAME];
        return $this->services[$key] = new $className();
    }

    protected function createClassWithArguments($key, $item)
    {
        $args = $item[KEYS::ARGUMENTS];
        $className = $item[KEYS::CLASSNAME];
        $createdArgs = [];
        foreach ($args as $arg) {
            if (!isset($this->store[$arg]))
                throw new ContainerException("Service \"$arg\" doesn't exists in config.php");

            $subItem = $this->store[$arg];
            $isClass = isset($subItem[KEYS::CLASSNAME]);
            if ($isClass) {
                $createdArgs[] = $this->getOrCreate($arg);
            } else {
                $createdArgs[] = $this->createElement($arg, $this->store[$arg]);
            }
        }
        return $this->services[$key] = new $className(...$createdArgs);
    }

    protected function createElement(
        $key,
        $element
    )
    {
        return $this->services[$key] = $element;
    }

    protected function getOrCreate($id)
    {
        try {
            return $this->get($id);
        } catch (NotFoundExceptionInterface) {
            return $this->createClass($id, $this->store[$id]);
        }
    }
}