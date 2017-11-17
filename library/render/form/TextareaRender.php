<?php

namespace Magein\renderdata\library\render\form;

use Magein\renderdata\library\constant\FormItemConstant;
use Magein\renderdata\library\render\FormRenderClass;

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