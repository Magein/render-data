<?php

namespace Magein\renderData\library;

abstract class RenderStyleAbstract
{
    /**
     * 等待渲染的数据
     * @var array
     */
    protected $data = [];

    /**
     * 等待渲染的数据中的字段列表
     * @var array
     */
    protected $field = [];

    /**
     * 渲染数据标题
     * @var array
     */
    protected $fieldTitle = [];

    /**
     * 传递数据
     * @param array $data
     * @param array $field
     * @param array $fieldTitle
     * @return mixed
     */
    abstract public function element(array $data, array $field, array $fieldTitle);

    /**
     * @param $style
     * @return mixed
     */
    abstract public function render($style);
}