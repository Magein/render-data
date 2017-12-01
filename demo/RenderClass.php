<?php

namespace Magein\renderData\demo;

use Magein\renderData\demo\render\DateRender;
use Magein\renderData\demo\render\OperateRender;
use Magein\renderData\library\RenderFactory;

trait RenderClass
{
    /**
     * @return DateRender
     */
    public function date()
    {
        $renderClass = new DateRender();
        RenderFactory::setFieldRenderClass($renderClass);
        return $renderClass;
    }

    public function operate()
    {
        $renderClass = new OperateRender();
        RenderFactory::setFieldRenderClass($renderClass);
        return $renderClass;
    }
}