<?php
$form=yii\bootstrap\ActiveForm::begin();
echo $form->field($model,'name');
echo $form->field($model,'goods_category_id')->dropDownList($options);
echo $form->field($model,'logo')->widget('manks\FileInput', []);

echo $form->field($model,'brand_id')->dropDownList($brand);
echo $form->field($model,'market_price');
echo $form->field($model,'shop_price');
echo $form->field($model,'stock');
echo $form->field($model,'is_on_sale')->radioList(['1'=>"上架",'0'=>"下架"]);
echo $form->field($model,'sort');
echo $form->field($gallery,'path')->widget('manks\FileInput', [

    'clientOptions' => [
        'pick' => [
            'multiple' => true,
        ]]

]);
echo $form->field($intro,'content')->widget('kucha\ueditor\UEditor',[]);
echo   \yii\bootstrap\Html::submitButton("提交",['class'=>'btn btn-success']);
yii\bootstrap\ActiveForm::end();


