<?php


namespace Magein\renderdata\library\render\form;

use Magein\renderdata\library\constant\FormItemConstant;
use Magein\renderdata\library\render\FormRenderClass;

class HiddenRender extends FormRenderClass
{
    public function __construct()
    {

        $this->setType(FormItemConstant::TYPE_HIDDEN);
    }
}