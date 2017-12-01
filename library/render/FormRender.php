<?php

namespace Magein\renderData\library\render;

use Magein\renderData\library\FieldRenderAbstract;

class FormRender extends FieldRenderAbstract
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
    protected $required = 0;

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
    protected $value = null;

    /**
     * @var int
     */
    protected $disabled = false;

    /**
     * @var int
     */
    protected $readonly = false;

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

        if ($this->readonly) {
            $attr .= ' readonly=true';
        }

        if ($this->disabled) {
            $attr .= ' disabled=true';
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
     * @param $required
     * @return $this
     */
    public function setRequired($required)
    {
        $this->required = $required;

        return $this;
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
     * @param $length
     * @return $this
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
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
     * @param bool $disabled
     * @return $this
     */
    public function setDisabled($disabled = true)
    {
        $this->disabled = $disabled;

        return $this;
    }
}