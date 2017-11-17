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

$data = getData(12);

use Magein\renderdata\library\RenderData;

$attr = new RenderData($data);
$attr->append('name', '姓名')->redirect()->setHref(function ($data) {
    return 'http://www.zsdx.cn?' . http_build_query(['id' => $data['id']]);
});
$attr->append('age', '年龄')->char();
$attr->append('sex', '性别')->char();
$attr->append('weight', '身高')->char();
$attr->append('favorite', '爱好')->char();
$attr->append('height', '体重')->char();
$attr->append('photo', '照片')->image();


echo $attr->render();


