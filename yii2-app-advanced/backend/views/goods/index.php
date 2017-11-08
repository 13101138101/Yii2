<?php echo  \yii\bootstrap\Html::a("添加分类",['add'],['class'=>'btn btn-info'])?>
<table class="table">
    <tr>
        <th>ID</th>
        <th>名称</th>
        <th>编号</th>
        <th>商品LOGO</th>
        <th>商品分类</th>
        <th>商品品牌</th>
        <th>市场价格</th>
        <th>本店价格</th>
        <th>库存</th>
        <th>是否上架</th>
        <th>状态</th>
        <th>排序</th>
        <th>录入时间</th>
        <th>操作</th>
    </tr>



    <?php  foreach ($users as $user): ?>
        <tr>
            <td><?= $user->id ?></td>
            <td><?= $user->name?></td>
            <td><?= $user->sn ?></td>
            <td><?= \yii\helpers\Html::img($user->logo,['width'=>50]); ?></td>
            <td><?= $user->goodsCategory->name?></td>
            <td><?= $user->brand->name ?></td>
            <td><?= $user->market_price ?></td>
            <td><?= $user->shop_price ?></td>
            <td><?= $user->stock ?></td>
            <td><?= $user->is_on_sale ?></td>
            <td><?= $user->status ?></td>
            <td><?= $user->sort ?></td>
            <td><?= date("Y-m-d H:i:s",$user->inputtime)?></td>

            <td><?php
                echo   \yii\bootstrap\Html::a("编辑",['goods/edit','id'=>$user->id],['class'=>'btn btn-info']);
                echo   \yii\bootstrap\Html::a("删除",['goods/del','id'=>$user->id],['class'=>'btn btn-danger']);

                ?> </td>
        </tr>

    <?php endforeach;?>



</table>