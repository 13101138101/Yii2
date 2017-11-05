<?php echo  \yii\bootstrap\Html::a("添加分类",['add'],['class'=>'btn btn-info'])?>
<table class="table">
    <tr>
        <th>ID</th>
        <th>分类名称</th>
        <th>简介</th>
        <th>排序</th>
        <th>状态</th>
        <th>操作</th>
    </tr>
    <?php  foreach ($users as $user): ?>
        <tr>
            <td><?= $user->id ?></td>
            <td><?= $user->name ?></td>
            <td><?= $user->status?></td>
            <td><?= $user->intro ?></td>
            <td><?= $user->sort ?></td>
            <td><?php
                echo   \yii\bootstrap\Html::a("编辑",['article-category/edit','id'=>$user->id],['class'=>'btn btn-info']);
                echo   \yii\bootstrap\Html::a("删除",['article-category/del','id'=>$user->id],['class'=>'btn btn-danger']);

                ?> </td>
        </tr>

    <?php endforeach;?>



</table>
