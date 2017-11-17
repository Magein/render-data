<?php

namespace Magein\view\library\render\form;

use Magein\view\library\constant\FormItemConstant;
use Magein\view\library\render\FormRenderClass;

class CheckboxRender extends FormRenderClass
{
    public function __construct()
    {
        $this->setType(FormItemConstant::TYPE_CHECKBOX);
    }

    protected function render()
    {
        $value = $this->value;

        $this->value = null;

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

                $input .= '<label><input ' . $attr . ($checked ? 'checked' : '') . '/>' . $option . '</label>';
            }

        }

        return $input;
    }

}