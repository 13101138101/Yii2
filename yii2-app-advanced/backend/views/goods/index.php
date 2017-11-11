<div class="col-md-2">
<?php echo  \yii\bootstrap\Html::a("添加分类",['add'],['class'=>'btn btn-info'])?>
</div>

<div class="col-md-10" >
    <form class="form-inline pull-right" method="get">
    <input type="text" class="form-control" id="minPrice" name="minPrice" placeholder="最低价" size="8"
    >-
    <input type="text" class="form-control" id="maxPrice" name="maxPrice" placeholder="最高价" size="8"
           >-
    <input type="text" class="form-control" id="keyword" name="keyword" placeholder="输入商品货号或关键字" size="16"
    >
    <button type="submit" class="btn btn-default">搜索</button>
    </form>
</div>


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
            <td><?= \backend\models\Goods::$is_on[$user->is_on_sale] ?></td>
            <td><?= \backend\models\Goods::$status_s[$user->status] ?></td>
            <td><?= $user->sort ?></td>
            <td><?= date("Y-m-d H:i:s",$user->inputtime)?></td>

            <td><?php
                echo   \yii\bootstrap\Html::a("编辑",['goods/edit','id'=>$user->id],['class'=>'btn btn-info']);
                echo   \yii\bootstrap\Html::a("删除",['goods/del','id'=>$user->id],['class'=>'btn btn-danger']);

                ?> </td>
        </tr>

    <?php endforeach;?>

</table>
<?php

echo \yii\widgets\LinkPager::widget([

    'pagination' => $page
]);
?>