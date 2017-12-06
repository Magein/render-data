<?php

namespace Magein\renderData\library\render\form;

use Magein\renderData\library\constant\FormFieldConstant;
use Magein\renderData\library\render\FormRender;

class RadioRender extends FormRender
{
    protected $type = FormFieldConstant::TYPE_RADIO;

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

        $this->value = null;

        $attr = $this->attr();

        $input = '';

        if ($this->options) {

            foreach ($this->options as $key => $option) {
                $checked = false;
                if ($value !== null && $value == $key) {
                    $checked = true;
                }
                $input .= '<label><input ' . $attr . ' value="' . $key . '" ' . ($checked ? 'checked' : '') . '/><span>' . $option . '</span></label>';
            }

        }

        return $input;
    }
}