<?php

namespace Magein\view\library\traits;

use Magein\view\library\render\form\CheckboxRender;
use Magein\view\library\render\form\FileRender;
use Magein\view\library\render\form\HiddenRender;
use Magein\view\library\render\form\PasswordRender;
use Magein\view\library\render\form\RadioRender;
use Magein\view\library\render\form\SelectRender;
use Magein\view\library\render\form\TextareaRender;
use Magein\view\library\render\form\TextRender;

use Magein\view\library\render\CharRenderClass;
use Magein\view\library\render\ImageRenderClass;
use Magein\view\library\render\RedirectRenderClass;

/**
 * Trait Tips
 * @package Magein\view\library\traits
 */
trait Tips
{
    /**
     *
     * @return CharRenderClass
     */
    public function char()
    {
        $renderClass = new CharRenderClass();
        $this->setRenderClass($renderClass);

        return $renderClass;
    }

    /**
     *
     * @return ImageRenderClass
     */
    public function image()
    {
        $renderClass = new ImageRenderClass();
        $this->setRenderClass($renderClass);

        return $renderClass;
    }

    /**
     * @return RedirectRenderClass
     */
    public function redirect()
    {
        $renderClass = new RedirectRenderClass();
        $this->setRenderClass($renderClass);

        return $renderClass;
    }

    /**
     * @return TextRender
     */
    public function text()
    {
        $renderClass = new TextRender();
        $this->setRenderClass($renderClass);

        return $renderClass;
    }

    /**
     * @return PasswordRender
     */
    public function password()
    {
        $renderClass = new PasswordRender();
        $this->setRenderClass($renderClass);

        return $renderClass;
    }

    /**
     * @return HiddenRender
     */
    public function hidden()
    {
        $renderClass = new HiddenRender();
        $this->setRenderClass($renderClass);

        return $renderClass;
    }

    /**
     * @return RadioRender
     */
    public function radio()
    {
        $renderClass = new RadioRender();
        $this->setRenderClass($renderClass);
        return $renderClass;
    }

    /**
     * @return CheckboxRender
     */
    public function checkbox()
    {
        $renderClass = new CheckboxRender();

        $this->setRenderClass($renderClass);

        return $renderClass;
    }

    /**
     * @return SelectRender
     */
    public function select()
    {
        $renderClass = new SelectRender();

        $this->setRenderClass($renderClass);

        return $renderClass;
    }

    /**
     * @return FileRender
     */
    public function file()
    {
        $renderClass = new FileRender();
        $this->setRenderClass($renderClass);

        return $renderClass;
    }

    /**
     * @return TextareaRender
     */
    public function textarea()
    {
        $renderClass = new TextareaRender();
        $this->setRenderClass($renderClass);

        return $renderClass;
    }
}