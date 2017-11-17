<?php

namespace Magein\renderdata\library\constant;

class Constant
{
    /**
     * @return array
     */
    public static function getTypeConstant()
    {
        $reflection = new \ReflectionClass(static::class);

        return $reflection->getConstants();
    }
}