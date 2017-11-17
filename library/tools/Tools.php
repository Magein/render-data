<?php

namespace Magein\view\tools;

class Tools
{
    /**
     * @param $href
     * @param $text
     * @param array $param
     * @param string $target
     * @return array
     */
    public static function redirect($href, $text, $param = [], $target = '_bank')
    {
        if ($param) {

            $string = '';

            foreach ($param as $key => $item) {
                $string .= $key . '=' . $item . '&';
            }

            $href = $href . '?' . substr($string, 0, strlen($string) - 1);

        }

        return ['href' => $href, 'text' => $text, 'target' => $target];
    }
}