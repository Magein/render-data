<?php

namespace Magein\renderData\library\render\form;

use Magein\renderData\library\constant\FormItemConstant;
use Magein\renderData\library\render\FormRenderClass;

class TextareaRender extends FormRenderClass
{

    public function __construct()
    {
        $this->setType(FormItemConstant::TYPE_TEXTAREA);
    }

    protected function render()
    {
        $value = $this->value;

        $this->value = null;

        $attr = $this->attr();

        $input = '<textarea ' . $attr . '>' . $value . '</textarea>';

        return $input;
    }

}