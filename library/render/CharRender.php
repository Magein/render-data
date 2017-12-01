<?php

namespace Magein\renderData\library\render;

use Magein\renderData\library\FieldRenderAbstract;

class CharRender extends FieldRenderAbstract
{
    /**
     * @return string
     */
    protected function render()
    {
        $value = $this->value;

        if (is_array($value)) {
            $value = implode(',', $value);
        }

        return '<span class="' . $this->class . '">' . $value . '</span>';
    }
}