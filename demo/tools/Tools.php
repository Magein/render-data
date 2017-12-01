<?php

namespace Magein\renderData\demo\tools;

class Tools
{
    /**
     * @param $operate
     * @param string $url
     * @param string $jsonData
     * @return array
     */
    public static function operate($operate, $url = '', $jsonData = '')
    {
        return [
            'operate' => $operate,
            'url' => $url,
            'data' => $jsonData
        ];
    }

    /**
     * @param string $url
     * @param array $data
     * @param string $redirect
     * @param string $dataType
     * @param string $type
     * @return array
     */
    public static function ajax($url, $data, $redirect = '', $dataType = 'json', $type = 'post')
    {
        return [
            'url' => $url,
            'data' => $data,
            'redirect' => $redirect,
            'dataType' => $dataType,
            'type' => $type
        ];
    }


    /**
     * @param string $message
     * @param array $ajax
     * @param array $config
     * @return array
     */
    public static function confirm($message, $ajax = [], $config = [])
    {
        return [
            'confirm' => [
                'message' => $message,
                'config' => $config,
            ],
            'ajax' => $ajax
        ];
    }

    /**
     * @param array|int $param
     * @param array $ajax
     * @param array $config
     * @return array
     */
    public static function prompt($param, $ajax = [], $config = [])
    {
        $input = [];
        if (is_int($param) && $param > 0) {
            for ($i = 1; $i <= $param; $i++) {
                $input[] = self::input('param');
            }
        } else {
            $input = $param;
        }

        return [
            'prompt' => [
                'input' => $input,
                'config' => $config,
            ],
            'ajax' => $ajax
        ];
    }

    /**
     * @param string $name
     * @param string $title
     * @param string $value
     * @param string $message
     * @return array
     */
    public static function input($name, $title = '', $value = '', $message = '')
    {
        return [
            'name' => $name,
            'title' => $title,
            'value' => $value,
            'message' => $message
        ];
    }
}