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
    protected $name = null;

    /**
     * @var string | array
     */
    protected $value = null;

    /**+
     * @var string
     */
    protected $class = null;

    /**
     * @var callable
     */
    protected $callback = null;

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
     * @param string $name
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
     * callback 一般用于动态修改渲染类
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
        return property_exists($this, $name) ? $this->$name : '';
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