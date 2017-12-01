<?php

namespace Magein\renderData\library;

/**
 * Class ItemAbstract
 * @package Magein\renderData\library
 *
 */
abstract class FieldRenderAbstract
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
     * @param $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @param $callback
     * @return $this
     */
    public function setCallback($callback)
    {
        $this->callback = $callback;

        return $this;
    }

    /**
     * @param $class
     * @return $this
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->$name;
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed|null
     */
    public function __call($name, $arguments)
    {
        if (method_exists($this, $name)) {
            return $this->$name();
        }
        return null;
    }
}