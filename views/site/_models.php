<?php
/* @var $models \app\models\Model */
use yii\helpers\Html;

$js = <<<JS
    $('#models').on('change', function() {
        $( "#equipment-block" ).load( "site/get-equipment?model_id=" + $(this).val());
        $( "#button" ).attr("data-model", $("#models option:selected").text());
    })
JS;

$this->registerJs($js, \yii\web\View::POS_READY);
?>

<div style="margin-top: 20px">
    <?= Html::dropDownList('models', [], $models, ['class' => 'form-control', 'prompt' => 'Выбрать модель', 'id' => 'models']) ?>
</div>
