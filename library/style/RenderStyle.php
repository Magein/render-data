<?php

namespace Magein\renderData\library\style;

use Magein\renderData\library\RenderStyleAbstract;

class RenderStyle extends RenderStyleAbstract
{
    /**
     * @param array $title
     * @param array $data
     * @return string
     */
    public function table(array $title, array $data)
    {
        $trans = function ($string, $item) {
            return $string . '<td>' . (is_array($item) ? implode(',', $item) : $item) . '</td>';
        };

        $tr = '';
        foreach ($data as $item) {
            $tr .= '<tr>' . array_reduce($item, $trans) . '</tr>';
        }

        $table = '<table><thead>' . array_reduce($title, $trans) . '</thead><tbody>' . $tr . '</tbody></table>';

        return $table;
    }

    /**
     * @param $title
     * @param $data
     * @return string
     */
    public function form($title, $data)
    {
        $form = '';

        foreach ($data as $name => $item) {

            if (isset($title[$name]) && $title[$name]) {
                $form .= '<div>' . $title[$name] . ':' . $item . '</div>';
            } else {
                $form .= $item;
            }

        }

        return $form;
    }
}