<?php

namespace Magein\renderData\library\tools;

use Magein\renderData\library\render\form\CheckboxRender;
use Magein\renderData\library\render\form\FileRender;
use Magein\renderData\library\render\form\HiddenRender;
use Magein\renderData\library\render\form\PasswordRender;
use Magein\renderData\library\render\form\RadioRender;
use Magein\renderData\library\render\form\SelectRender;
use Magein\renderData\library\render\form\TextareaRender;
use Magein\renderData\library\render\form\TextRender;

use Magein\renderData\library\render\CharRender;
use Magein\renderData\library\render\ImageRender;
use Magein\renderData\library\render\RedirectRender;
use Magein\renderData\library\RenderFactory;

/**
 * Trait Tips
 * @package Magein\renderData\library\traits
 */
class RenderClass
{
    /**
     *
     * @return CharRender
     */
    public function char()
    {
        $renderClass = new CharRender();
        RenderFactory::setFieldRenderClass($renderClass);

        return $renderClass;
    }

    /**
     *
     * @return ImageRender
     */
    public function image()
    {
        $renderClass = new ImageRender();
        RenderFactory::setFieldRenderClass($renderClass);

        return $renderClass;
    }

    /**
     * @return RedirectRender
     */
    public function redirect()
    {
        $renderClass = new RedirectRender();
        RenderFactory::setFieldRenderClass($renderClass);

        return $renderClass;
    }

    /**
     * @return TextRender
     */
    public function text()
    {
        $renderClass = new TextRender();
        RenderFactory::setFieldRenderClass($renderClass);

        return $renderClass;
    }

    /**
     * @return PasswordRender
     */
    public function password()
    {
        $renderClass = new PasswordRender();
        RenderFactory::setFieldRenderClass($renderClass);

        return $renderClass;
    }

    /**
     * @return HiddenRender
     */
    public function hidden()
    {
        $renderClass = new HiddenRender();
        RenderFactory::setFieldRenderClass($renderClass);

        return $renderClass;
    }

    /**
     * @return RadioRender
     */
    public function radio()
    {
        $renderClass = new RadioRender();
        RenderFactory::setFieldRenderClass($renderClass);
        return $renderClass;
    }

    /**
     * @return CheckboxRender
     */
    public function checkbox()
    {
        $renderClass = new CheckboxRender();

        RenderFactory::setFieldRenderClass($renderClass);

        return $renderClass;
    }

    /**
     * @return SelectRender
     */
    public function select()
    {
        $renderClass = new SelectRender();

        RenderFactory::setFieldRenderClass($renderClass);

        return $renderClass;
    }

    /**
     * @return FileRender
     */
    public function file()
    {
        $renderClass = new FileRender();
        RenderFactory::setFieldRenderClass($renderClass);

        return $renderClass;
    }

    /**
     * @return TextareaRender
     */
    public function textarea()
    {
        $renderClass = new TextareaRender();
        RenderFactory::setFieldRenderClass($renderClass);

        return $renderClass;
    }
}