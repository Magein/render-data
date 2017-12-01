<?php

namespace Magein\renderData\library\style;

use Magein\renderData\library\RenderFactory;
use Magein\renderData\library\RenderStyleAbstract;

class RenderStyle extends RenderStyleAbstract
{
    /**
     * @param array $data
     * @param array $field
     * @param array $fieldTitle
     * @return $this
     */
    public function element(array $data, array $field, array $fieldTitle)
    {
        $this->data = $data;

        $this->field = $field;

        $this->fieldTitle = $fieldTitle;

        return $this;
    }

    /**
     * @param $style
     * @return string
     */
    public function render($style)
    {
        return call_user_func([$this, $style]);
    }

    /**
     * @return string
     */
    public function table()
    {
        $result = [];
        if ($this->data) {
            foreach ($this->data as $item) {
                $result[] = RenderFactory::renderData($this->field, $item);
            }
        }

        $trans = function ($string, $item) {
            return $string . '<td>' . (is_array($item) ? implode(',', $item) : $item) . '</td>';
        };

        $tr = '';

        if ($result) {
            foreach ($result as $item) {
                $tr .= '<tr>' . array_reduce($item, $trans) . '</tr>';
            }
        }

        $table = '<thead>' . array_reduce($this->fieldTitle, $trans) . '</thead><tbody>' . $tr . '</tbody>';

        return $table;
    }

    /**
     * @return string
     */
    public function form()
    {
        $form = '';

        $result = RenderFactory::renderData($this->field, $this->data);

        if ($result) {

            foreach ($result as $name => $item) {

                $title = isset($this->fieldTitle[$name]) ? $this->fieldTitle[$name] : '';

                if ($title) {
                    $form .= '<div>' . $title . ':' . $item . '</div>';
                } else {
                    $form .= $item;
                }

            }
        }

        return $form;
    }
}