<?php

namespace Magein\view\library\render;

use Magein\view\library\RenderClassAbstract;

class FormRenderClass extends RenderClassAbstract
{
    /**
     * @var string
     */
    protected $type = '';

    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var integer
     */
    protected $required = 1;

    /**
     * @var string
     */
    protected $placeholder = '';

    /**
     * @var array
     */
    protected $length = [];

    /**
     * @var array
     */
    protected $options = [];

    /**
     * @var string|array
     */
    protected $value = '';

    /**
     * @return string
     */
    protected function attr()
    {
        $attr = '';

        if ($this->type) {
            $attr .= ' type="' . $this->type . '"';
        }

        if ($this->name) {
            $attr .= ' name="' . $this->name . '"';
        }

        if ($this->value) {
            $attr .= ' value="' . $this->value . '"';
        }

        if ($this->placeholder) {
            $attr .= ' placeholder="' . $this->placeholder . '"';
        }

        if ($this->required) {
            $attr .= ' required="' . $this->required . '"';
        }

        if ($this->class) {
            $attr .= ' class="' . $this->class . '"';
        }

        if ($this->length) {
            $attr .= ' minlength="' . isset($this->length[0]) ? $this->length[0] : 1 . '"';
            $attr .= ' maxlength="' . isset($this->length[1]) ? $this->length[1] : 255 . '"';
        }

        return $attr;
    }

    /**
     * @return string
     */
    protected function render()
    {
        $attr = $this->attr();

        return '<input ' . $attr . '/>';
    }

    /**
     * @param array $data
     */
    public function init($data)
    {
        $properties = $this->getProperties(true);
        foreach ($data as $key => $item) {
            if (in_array($key, $properties)) {
                $this->$key = $item;
            }
        }
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    protected function setType($type)
    {
        $this->type = $type;
    }


    /**
     * @return string
     */
    protected function getName()
    {
        return $this->name;
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
     * @return int
     */
    protected function getRequired()
    {
        return $this->required;
    }

    /**
     * @param $required
     * @return $this
     */
    public function setRequired($required)
    {
        $this->required = $required;

        return $this;
    }

    /**
     * @return string
     */
    protected function getPlaceholder()
    {
        return $this->placeholder;
    }

    /**
     * @param $placeholder
     * @return $this
     */
    public function setPlaceholder($placeholder)
    {
        $this->placeholder = $placeholder;

        return $this;
    }

    /**
     * @return array
     */
    protected function getLength()
    {
        return $this->length;
    }

    /**
     * @param $length
     * @return $this
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * @return array
     */
    protected function getOptions()
    {
        return $this->options;
    }

    /**
     * @param $options
     * @return $this
     */
    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @return array|string
     */
    protected function getValue()
    {
        return $this->value;
    }

    /**
     * @param array|string $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @param bool $toArray
     * @return \ReflectionProperty[]
     */
    protected function getProperties($toArray = false)
    {
        $refection = new \ReflectionClass($this);

        $properties = $refection->getProperties();

        if ($toArray) {
            foreach ($properties as $key => $item) {
                $properties[$key] = $item->name;
            }
        }

        return $properties;
    }

    /**
     * @return array
     */
    public function toArray()
    {

        $properties = $this->getProperties();

        $data = [];

        foreach ($properties as $property) {

            $name = $property->name;

            $data[$name] = $this->$name;
        }

        return $data;
    }

    /**
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toArray(), JSON_UNESCAPED_UNICODE);
    }
}