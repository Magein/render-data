<?php

require_once './function.php';

use Magein\renderData\library\RenderFactory;
use Magein\renderData\library\constant\RenderStyleConstant;


$data = getData(1);

$data = array_pop($data);

$renderData = new RenderFactory($data, RenderStyleConstant::RENDER_FORM);
$renderData->setFieldTitle(getFieldTitle());

$renderData->append('name')->text();
$renderData->append('age')->select()->setOptions([16 => 16, 17 => 17, 18 => 18, 19 => 19]);
$renderData->append('time','时间')->date();
$renderData->append('sex')->radio()->setOptions(['男', '女']);
$renderData->append('country');
$renderData->append('photo')->file();
$renderData->append('old_photo')->hidden();
$renderData->append('weight');
$renderData->append('favorite')->checkbox()->setOptions(['吃', '喝', '玩', '乐']);
$renderData->append('height');
$renderData->append('intro')->textarea();

//$renderData->append('name', '姓名');
//$renderData->append('age', '年龄')->select()->setOptions([16 => 16, 17 => 17, 18 => 18, 19 => 19]);
//$renderData->append('sex', '性别')->radio()->setOptions(['男', '女']);
//$renderData->append('country', '国家');
//$renderData->append('upload_photo', '照片')->file();
//$renderData->append('photo', '')->hidden();
//$renderData->append('weight', '身高');
//$renderData->append('favorite', '爱好')->checkbox()->setOptions(['吃', '喝', '玩', '乐']);
//$renderData->append('height', '体重');
//$renderData->append('intro', '简介')->textarea();

$form = $renderData->render();
?>

<!DOCTYPE html>
<html>
<head>
    <title>表单展示</title>
    <style>

    </style>
</head>
<body>

<form>
    <?php echo $form ?>
</form>

</body>
</html>