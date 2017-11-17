<?php

namespace Magein\renderdata\library\render;

use Magein\renderdata\library\RenderClassAbstract;

class RedirectRenderClass extends RenderClassAbstract
{
    /**
     * @var string|callable
     */
    private $href;

    /**
     * @var string|array
     */
    private $param;

    /**
     * @var string
     */
    private $target = '_self';

    /**
     * @var string
     */
    private $description = '';

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
     * @param string|array $param
     * @return $this
     */
    public function setParam($param)
    {
        $this->param = $param;

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
     * @param string|array $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrl()
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

        if (is_string($value)) {
            return '<a href="' . $this->getUrl() . '" target="' . $this->target . '"/>' . $value . '</a>';
        }
        return null;
    }

}