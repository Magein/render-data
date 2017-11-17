<?php

namespace Magein\view\library\render\form;

use Magein\view\library\constant\FormItemConstant;
use Magein\view\library\render\FormRenderClass;

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