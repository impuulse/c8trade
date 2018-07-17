<?php
use yii\helpers\Html;
/* @var $equipment \app\models\Equipment */

$js = <<<JS
    $('#equipment').on('change', function() {
        $( "#button" ).show();
        $( "#button" ).attr("data-equipment", $("#equipment option:selected").text());
    })
    
    $( "#button" ).on('click', function() {
        var brand = $(button).data('brand');
        var model = $(button).data('model');
        var equipment = $(button).data('equipment');
        window.location.href='/catalog/' + brand + '/' + model + '/' + equipment;
    })
JS;

$this->registerJs($js, \yii\web\View::POS_READY);
?>

<div style="margin-top: 20px">
    <?= Html::dropDownList('equipment', [], $equipment, ['class' => 'form-control', 'prompt' => 'Выбрать комплектацию', 'id' => 'equipment']) ?>
</div>

