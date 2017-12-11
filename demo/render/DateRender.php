<?php

namespace Magein\renderData\demo\render;

use Magein\renderData\library\FieldRenderAbstract;

class DateRender extends FieldRenderAbstract
{
    protected function render()
    {
        return '<input type="date" name="' . $this->name . '" value="' . $this->value . '"/>';
    }
}