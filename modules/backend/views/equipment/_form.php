<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Equipment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipment-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'model_id')->dropDownList($model->getModelsList(), ['prompt' => 'Выбрать']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php if($model->image) : ?>
        <img width="200px" src="/<?=$model->image?>">
    <?php endif; ?>
    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
