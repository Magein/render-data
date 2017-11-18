<?php

namespace Magein\renderData\library\render;

use Magein\renderData\library\RenderClassAbstract;

class ImageRenderClass extends RenderClassAbstract
{
    /**
     * @return mixed
     */
    protected function render()
    {
        $value = $this->value;

        if (is_string($value)) {
            $value = [$value];
        }

        return array_reduce($value, function ($string, $item) {
            return $string . '<img src="' . $item . '"/>';
        });
    }
}