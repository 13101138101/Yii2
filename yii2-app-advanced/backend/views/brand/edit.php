



<?php $from=\yii\bootstrap\ActiveForm::begin()?>
<?php //;exit();?>
<?=$from->field($model,'name')->textInput()  ?>
<?=$from->field($model,'intro')->textInput()?>
<?=$from->field($model,'logo')->widget('manks\FileInput', [
]);  ?>
<?=$from->field($model,'status')->radioList(['0'=>"隐藏",'2'=>"显示"]) ?>

<?=\yii\bootstrap\Html::submitButton("修改",['class'=>'btn btn-success']) ?>

<?php \yii\bootstrap\ActiveForm::end() ?>
