<?php

namespace Magein\renderdata\library;

/**
 * Class ItemAbstract
 * @package Magein\renderdata\library
 *
 * @method getRender
 */
abstract class RenderClassAbstract
{
    /**
     * @return string
     */
    abstract protected function render();

    /**
     * @var array
     */
    protected $data;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string | array
     */
    protected $value;

    /**+
     * @var string
     */
    protected $class;

    /**
     * @var callable
     */
    protected $callback;

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param array|string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @param callable $callback
     */
    public function setCallback($callback)
    {
        $this->callback = $callback;
    }

    /**
     * @return callable
     */
    public function getCallback()
    {
        return $this->callback;
    }

    /**
     * @param $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed|null
     */
    public function __call($name, $arguments)
    {
        preg_match('/get([a-zA-Z]+)/', $name, $matches);

        if (isset($matches[1])) {
            $method = lcfirst($matches[1]);
            return $this->$method();
        }

        return null;
    }
}