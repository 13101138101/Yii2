
<a href="add" class="btn btn-info">添加用户</a>
<table class="table">
    <tr>
        <th>ID</th>
        <th>品牌名</th>
        <th>简历</th>
        <th>图片</th>
        <th>状态</th>
        <th>操作</th>
    </tr>
    <?php  foreach ($users as $user): ?>
        <tr>
            <td><?= $user->id ?></td>
            <td><?= $user->name ?></td>
            <td><?= $user->intro ?></td>
            <td><?php
                echo  \yii\helpers\Html::img($user->logo,['width'=>'80px']);
                ?></td>
            <td><?= ($user->status==0)?"隐藏":"显示"; ?></td>
            <td><?php
                echo   \yii\bootstrap\Html::a("编辑",['brand/edit','id'=>$user->id],['class'=>'btn btn-info']);
                echo   \yii\bootstrap\Html::a("删除",['brand/del','id'=>$user->id],['class'=>'btn btn-danger']);

                ?> </td>
        </tr>

    <?php endforeach;?>



</table>

<?php

echo \yii\widgets\LinkPager::widget([

    'pagination' => $page
]);
?>
