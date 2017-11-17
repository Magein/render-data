<?php

namespace Magein\view\library\render\form;


use Magein\view\library\constant\FormItemConstant;
use Magein\view\library\render\FormRenderClass;

class PasswordRender extends FormRenderClass
{
    public function __construct()
    {
        $this->setType(FormItemConstant::TYPE_PASSWORD);
    }
}