<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/11/5
 * Time: 14:59
 */

namespace backend\components;


use creocoder\nestedsets\NestedSetsQueryBehavior;
use yii\db\ActiveQuery;

class GoodsQuery extends ActiveQuery
{

    public function behaviors()
    {
        return[

            NestedSetsQueryBehavior::className()

        ] ;


    }

}


