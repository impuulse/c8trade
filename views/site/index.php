<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Brand;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';

$js = <<<JS
    $('#brand').on('change', function() {
        $( "#models-block" ).load( "site/get-models?brand_id=" + $(this).val());
        $( "#button" ).attr("data-brand", $("#brand option:selected").text());
    })
JS;

$this->registerJs($js, \yii\web\View::POS_READY);

?>
<div class="site-index">

    <?= Html::dropDownList('brands', [], ArrayHelper::map(Brand::find()->all(), 'id', 'name'), ['class' => 'form-control', 'prompt' => 'Выбрать марку', 'id' => 'brand']) ?>

    <div id="models-block"></div>

    <div id="equipment-block"></div>

    <div style="margin-top: 20px">
        <button id="button" style="display: none" class="btn btn-default">Подробнее</button>
    </div>

</div>
