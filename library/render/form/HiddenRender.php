<?php


namespace Magein\renderData\library\render\form;

use Magein\renderData\library\constant\FormFieldConstant;
use Magein\renderData\library\render\FormRender;

class HiddenRender extends FormRender
{
    protected $type = FormFieldConstant::TYPE_HIDDEN;
}