<?php

namespace Magein\renderData\library\render;

use Magein\renderData\library\FieldRenderAbstract;

class ImageRender extends FieldRenderAbstract
{
    /**
     * @return mixed
     */
    protected function render()
    {
        $value = $this->value;

        if (empty($value)) {
            return '';
        }

        if (is_string($value)) {
            $value = [$value];
        }

        $class = $this->class;

        return array_reduce($value, function ($string, $item) use ($class) {
            return $string . '<img src="' . $item . '" class="' . $class . '"/>';
        });
    }
}