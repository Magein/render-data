<?php

namespace Magein\renderData\library;

abstract class RenderStyleAbstract
{
    /**
     * @param array $title
     * @param array $data
     * @return string
     */
    abstract public function table(array $title, array $data);

    /**
     * @param $title
     * @param $data
     * @return string
     */
    abstract public function form($title, $data);
}