<?php

namespace Magein\renderData\library\render\form;

use Magein\renderData\library\constant\FormFieldConstant;
use Magein\renderData\library\render\FormRender;

class SelectRender extends FormRender
{
    protected $type=FormFieldConstant::TYPE_SELECT;

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

                $selected = false;
                if ($value !== null && $value == $key) {
                    $selected = true;
                }

                $input .= '<option value="' . $key . '" ' . ($selected ? 'selected' : '') . '>' . $option . '</option>';
            }

            $input = '<select ' . $attr . '>' . $input . '</select>';

        }

        return $input;
    }

}