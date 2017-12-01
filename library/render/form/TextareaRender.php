<?php

namespace Magein\renderData\library\render\form;

use Magein\renderData\library\constant\FormFieldConstant;
use Magein\renderData\library\render\FormRender;

class TextareaRender extends FormRender
{
    protected $type=FormFieldConstant::TYPE_TEXTAREA;

    protected function render()
    {
        $value = $this->value;

        $this->value = null;

        $attr = $this->attr();

        $input = '<textarea ' . $attr . '>' . $value . '</textarea>';

        return $input;
    }

}