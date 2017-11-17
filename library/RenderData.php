<?php

namespace Magein\renderdata\library;

use Magein\renderdata\library\constant\RenderStyleConstant;
use Magein\renderdata\library\render\CharRenderClass;
use Magein\renderdata\library\render\form\TextRender;
use Magein\renderdata\library\style\RenderStyle;
use Magein\renderdata\library\traits\Tips;

class RenderData
{
    use Tips;

    /**
     * @var array
     */
    private $queues = [];

    /**
     * @var string
     */
    private $lastName = '';

    /**
     * @var array
     */
    private $data;

    /**
     * @var string
     */
    private $renderStyle;

    /**
     * @var RenderStyle
     */
    private $renderStyleClass;

    /**
     * VisualData constructor.
     * @param array $data
     * @param string $renderStyle
     */
    public function __construct($data = [], $renderStyle = RenderStyleConstant::RENDER_TABLE)
    {
        $this->data = $data;

        $this->renderStyle = $renderStyle;

        $this->renderStyleClass = new RenderStyle();
    }

    /**
     * @param $name
     * @param string $title
     * @param RenderClassAbstract|null $item
     * @return $this
     */
    public function append($name, $title = '', RenderClassAbstract $item = null)
    {
        if (null === $item) {
            if ($this->renderStyle == RenderStyleConstant::RENDER_TABLE) {
                $item = new CharRenderClass();
            } else {
                $item = new TextRender();
                $item->setName($name);
            }
        }

        $this->queues[$name] = [
            'name' => $name,
            'title' => $title,
            'item' => $item
        ];

        $this->lastName = $name;

        return $this;
    }

    /**
     * @return array
     */
    private function getTitleToArray()
    {
        $title = [];
        foreach ($this->queues as $item) {
            $title[$item['name']] = $item['title'];
        }

        return $title;
    }

    /**
     * @param RenderClassAbstract $item
     */
    private function setRenderClass(RenderClassAbstract $item)
    {
        $item->setName($this->lastName);
        $this->queues[$this->lastName]['item'] = $item;
    }

    /**
     * @param $data
     * @return array
     */
    private function transData($data)
    {
        $row = [];

        if (empty($data)) {
            return $row;
        }

        foreach ($this->queues as $name => $item) {
            /**
             * @var RenderClassAbstract $object
             */
            $object = $item['item'];

            if ($object->getCallback()) {
                $object = call_user_func($object->getCallback(), $data);
            }

            $object->setValue(isset($data[$name]) ? $data[$name] : '');
            $object->setData($data);
            $row[$name] = $object->getRender();
        }

        return $row;
    }

    /**
     * @return string
     */
    public function render()
    {

        $title = $this->getTitleToArray();

        $result = [];


        if ($this->renderStyle == RenderStyleConstant::RENDER_FORM) {

            $result = $this->transData($this->data);

            return $this->renderStyleClass->form($title, $result);

        } else {
            foreach ($this->data as $data) {
                $result[] = $this->transData($data);
            }
            return $this->renderStyleClass->table($title, $result);
        }
    }

    /**
     * @param RenderStyle $class
     */
    public function setRenderStyleClass(RenderStyle $class)
    {
        $this->renderStyleClass = $class;
    }

    /**
     * @return RenderStyle
     */
    public function getRenderStyleClass()
    {
        return $this->renderStyleClass;
    }

}