<?php

namespace Magein\renderData\library\render\form;


use Magein\renderData\library\constant\FormItemConstant;
use Magein\renderData\library\render\FormRenderClass;

class PasswordRender extends FormRenderClass
{
    public function __construct()
    {
        $this->setType(FormItemConstant::TYPE_PASSWORD);
    }
}