<?php
$form=yii\bootstrap\ActiveForm::begin();
echo $form->field($admin,'username');
echo $form->field($admin,'password')->passwordInput();
echo \yii\helpers\Html::submitButton('添加用户',['class'=>'btn btn-success']);

yii\bootstrap\ActiveForm::end();