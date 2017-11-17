<?php

namespace Magein\renderdata\library\render\form;

use Magein\renderdata\library\constant\FormItemConstant;
use Magein\renderdata\library\render\FormRenderClass;

class RadioRender extends FormRenderClass
{

    public function __construct()
    {
        $this->setType(FormItemConstant::TYPE_RADIO);
    }

    protected function render()
    {
        $attr = $this->attr();

        $input = '';

        $value = $this->value;

        if ($this->options) {

            foreach ($this->options as $key => $option) {

                if ($value !== null && $value == $key) {
                    $checked = true;
                }

                $input .= '<label><input ' . $attr . ' value=' . $key . (isset($checked) ? 'checked' : '') . '/>' . $option . '</label>';
            }

        }

        return $input;
    }
}