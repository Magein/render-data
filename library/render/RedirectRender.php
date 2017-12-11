<?php

namespace Magein\renderData\library\render;

use Magein\renderData\library\FieldRenderAbstract;

class RedirectRender extends FieldRenderAbstract
{
    /**
     * @var string|callable
     */
    private $href;

    /**
     * @var string
     */
    private $target = '_bank';

    /**
     * @param string|callable $href
     * @return $this
     */
    public function setHref($href)
    {
        $this->href = $href;

        return $this;
    }

    /**
     * @param string | array $target
     * @return $this
     */
    public function setTarget($target)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * @return mixed
     */
    private function getUrl()
    {
        $href = $this->href;

        if (is_object($href)) {
            $href = call_user_func($this->href, $this->data);
        }

        return $href;
    }

    /**
     * @return null|string
     */
    protected function render()
    {
        $value = $this->value;

        $href = $this->getUrl() ?: 'javascript:;';

        if (is_string($value) || is_int($value)) {

            if (is_string($href)) {
                return '<a href="' . $href . '" target="' . $this->target . '" class="' . $this->class . '"/>' . $value . '</a>';
            }
        }

        return null;
    }

}