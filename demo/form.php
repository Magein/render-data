<?php

spl_autoload_register(function ($class) {
    preg_match('/Magein\\\view\\\([a-zA-Z\\\]+)/', $class, $matches);
    $dir = isset($matches[1]) ? $matches[1] : null;
    if ($dir) {
        $dir = '../' . $dir . '.php';
        if (is_file($dir)) {
            include $dir;
        }
    }
});

require_once './function.php';

use Magein\renderdata\library\RenderData;

$data = getData(1);

$data = array_pop($data);

$attr = new RenderData($data, \Magein\renderdata\library\constant\RenderStyleConstant::RENDER_FORM);

$attr->append('name', '姓名');
$attr->append('age', '年龄')->select()->setOptions([16 => 16, 17 => 17, 18 => 18, 19 => 19]);
$attr->append('sex', '性别')->radio()->setOptions(['男', '女']);
$attr->append('upload_photo', '照片')->file();
$attr->append('photo', '')->hidden();
$attr->append('weight', '身高');
$attr->append('favorite', '爱好')->checkbox()->setOptions(['吃', '喝', '玩', '乐']);
$attr->append('height', '体重');
$attr->append('intro', '简介')->textarea();

echo $attr->render();