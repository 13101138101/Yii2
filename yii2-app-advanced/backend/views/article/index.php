



<!--<a href="add" class="btn btn-info">添加用户</a>-->
<?php echo  \yii\bootstrap\Html::a("添加用户",['add'],['class'=>'btn btn-info'])?>
<table class="table">
    <tr>
        <th>ID</th>
        <th>名称</th>
        <th>文章分类</th>
        <th>简介</th>
        <th>内容</th>
        <th>排序</th>
        <th>状态</th>
        <th>录入时间</th>
        <th>操作</th>
    </tr>
    <?php  foreach ($users as $user): ?>
        <tr>
            <td><?= $user->id ?></td>
            <td><?= $user->name ?></td>
            <td><?= $user->articleCategory->name?></td>
            <td><?= $user->intro ?></td>
            <td><?= mb_substr($user->articleDetail->content,0,10)."......";
                echo  \yii\bootstrap\Html::a("查看全部内容",['content','id'=>$user->id])?></td>
            <td><?= $user->sort ?></td>
            <td><?= $user->status==1?"显示":"隐藏" ?></td>
            <td><?= date('Y-m-d H:i:s',$user->inputtime)  ?></td>

            <td><?php
                echo   \yii\bootstrap\Html::a("编辑",['article/edit','id'=>$user->id,'article_id'=>$user->id],['class'=>'btn btn-info']);
                echo   \yii\bootstrap\Html::a("删除",['article/del','id'=>$user->id,'article_id'=>$user->id],['class'=>'btn btn-danger']);

                ?> </td>
        </tr>

    <?php endforeach;?>



</table>

<?php
/*
echo \yii\widgets\LinkPager::widget([

    'pagination' => $page
]);
*/?>






