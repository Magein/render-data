<?php

require_once './function.php';

$data = getData(20);

use Magein\renderData\library\RenderFactory;
use Magein\renderData\library\constant\RenderStyleConstant;

$renderData = new RenderFactory($data, RenderStyleConstant::RENDER_TABLE);
$renderData->setFieldTitle(getFieldTitle());

$renderData->append('id')->redirect()->setHref(function ($param) {
    return './form.php?id=' . $param['id'];
});
$renderData->append('score');
$renderData->append('name');
$renderData->append('age');
$renderData->append('sex');
$renderData->append('country');
$renderData->append('weight');
$renderData->append('favorite');
$renderData->append('height');
$renderData->append('photo')->image();
$renderData->append('operate')->operate()->setOperate(function ($param) {

    $deleteAjax = \Magein\renderData\demo\tools\Tools::ajax('./table.php', ['id' => $param['id']]);
    $deleteConfirm = \Magein\renderData\demo\tools\Tools::confirm('请再次确认是否删除', $deleteAjax);

    $input[] = \Magein\renderData\demo\tools\Tools::input('reason', '原因', '没有原因', '这个错误信息');
    $input[] = \Magein\renderData\demo\tools\Tools::input('name', '姓名', '不知道');
    $prompt = \Magein\renderData\demo\tools\Tools::prompt($input, $deleteAjax);

    $operate[] = \Magein\renderData\demo\tools\Tools::operate('编辑', './table.php?id=' . $param['id']);
    $operate[] = \Magein\renderData\demo\tools\Tools::operate('删除', '', $deleteConfirm);
    $operate[] = \Magein\renderData\demo\tools\Tools::operate('弹出框', '', $prompt);

    return $operate;
});

//$renderData->append('name', '姓名');
//$renderData->append('age', '年龄');
//$renderData->append('sex', '性别');
//$renderData->append('weight', '身高');
//$renderData->append('favorite', '爱好');
//$renderData->append('height', '体重');
//$renderData->append('photo', '照片');

$table = $renderData->render();

?>

<!DOCTYPE html>
<html>
<head>
    <title>表格展示</title>
    <style>
        img {
            width: 50px;
        }

        table th, td {
            border: 1px solid #cccccc;
        }

        th, td {
            padding: 0px 30px 0px 30px;
        }
    </style>

    <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="./static/layer/layer.js"></script>
    <script type="text/javascript" src="./static/js/demo.js"></script>

</head>
<body>

<table border="0" cellspacing="0" cellpadding="0">
    <?php echo $table ?>
</table>

</body>
</html>



