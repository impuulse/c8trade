<?php
/* @var $equipment \app\models\Equipment */
?>

<div>
    <div class="name"><?=$equipment->model->brand->name?>/<?=$equipment->model->name?>/<?=$equipment->name?></div>
    <div>
        <img src="/<?=$equipment->image?>" width="200px">
    </div>
    <div>
        <?=$equipment->description?>
    </div>
</div>
