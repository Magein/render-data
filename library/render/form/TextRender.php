<?php

namespace Magein\renderdata\library\render\form;

use Magein\renderdata\library\constant\FormItemConstant;
use Magein\renderdata\library\render\FormRenderClass;

class TextRender extends FormRenderClass
{

    public function __construct()
    {
        $this->setType(FormItemConstant::TYPE_TEXT);
    }

}