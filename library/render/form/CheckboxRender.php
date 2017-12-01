<?php

namespace Magein\renderData\library\render\form;

use Magein\renderData\library\constant\FormFieldConstant;
use Magein\renderData\library\render\FormRender;

class CheckboxRender extends FormRender
{
    protected $type = FormFieldConstant::TYPE_CHECKBOX;

    /**
     * @param $options
     * @return $this
     */
    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

    protected function render()
    {
        $value = $this->value;

        $name = $this->name;

        $this->value = null;
        $this->name = null;
        $attr = $this->attr();


        $input = '';

        if ($this->options) {

            foreach ($this->options as $key => $option) {

                if (!is_array($value)) {
                    $value = [$value];
                }

                if ($value !== null && in_array($key, $value)) {
                    $checked = true;
                } else {
                    $checked = false;
                }

                $input .= '<label><input name="' . $name . '[]"' . $attr . ($checked ? 'checked' : '') . ' value="' . $key . '"/>' . $option . '</label>';
            }

        }

        return $input;
    }

}