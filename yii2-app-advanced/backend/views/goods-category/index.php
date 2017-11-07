<?php echo  \yii\bootstrap\Html::a("添加分类",['add'],['class'=>'btn btn-info'])?>
<table class="table">
    <tr>
        <th>ID</th>
        <th>类型</th>
        <th>简介</th>
        <th>操作</th>
    </tr>

    <td><?=
        \liyuze\ztree\ZTree::widget([
            'setting' => '{
            callback:{
                   onClick:function(event, treeId, treeNode){
           
                   $("#goodscategory-parent_id").val(treeNode.id);
                   }
            },
     
			data: {
				simpleData: {
					enable: true,
					idKey:"id",
					pIdKey:"parent_id",
					rootPId:0
				}
			}
		}',
            'nodes' => $users
        ]);
        ?></td>

    <?php  foreach ($users as $user): ?>
        <tr>
            <td><?= $user->id ?></td>

            <td><?= $user->intro ?></td>
            <td><?php
                echo   \yii\bootstrap\Html::a("编辑",['article-category/edit','id'=>$user->id],['class'=>'btn btn-info']);
                echo   \yii\bootstrap\Html::a("删除",['article-category/del','id'=>$user->id],['class'=>'btn btn-danger']);

                ?> </td>
        </tr>

    <?php endforeach;?>



</table>
