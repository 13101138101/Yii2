



<?php $from=\yii\bootstrap\ActiveForm::begin()?>
<?=$from->field($model,'name')->textInput()  ?>
<?=$from->field($model,'intro')->textInput()?>
<?=$from->field($model,'status')->radioList(['0'=>"隐藏",'2'=>"显示"]) ?>
<?=$from->field($model,'sort')->textInput()  ?>
<?=$from->field($model,'is_help')->textInput()  ?>

<?=\yii\bootstrap\Html::submitButton("提交",['class'=>'btn btn-success']) ?>

<?php \yii\bootstrap\ActiveForm::end() ?>
