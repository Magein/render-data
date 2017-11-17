<?php

namespace Magein\renderdata\library\render\form;


use Magein\renderdata\library\constant\FormItemConstant;
use Magein\renderdata\library\render\FormRenderClass;

class PasswordRender extends FormRenderClass
{
    public function __construct()
    {
        $this->setType(FormItemConstant::TYPE_PASSWORD);
    }
}