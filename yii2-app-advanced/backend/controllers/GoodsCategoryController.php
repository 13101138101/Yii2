<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/11/5
 * Time: 14:40
 */

namespace backend\controllers;


use backend\models\GoodsCategory;
use yii\base\Controller;


class GoodsCategoryController extends Controller
{
    public function actionIndex(){

        $users=GoodsCategory::find()->all();

        return $this->render('index',['users'=>$users]);

    }


    //添加商品分类

    /**
     * @return string
     */
    public function actionAdd(){

        $model=new GoodsCategory();


         $request=\Yii::$app->request;

         if($request->isPost){

           $model->load($request->post());

           if($model->validate()){

               if($model->parent_id==0){

                   $model->makeRoot();


               }else{

                   //创建子节点


                   //1,把父节点找到
                   $cateParent=GoodsCategory::findOne(1);
//var_dump($cateParent);exit;
                   //把当前节点对象添加到父类对象中
                   $model->prependTo($cateParent);


               }
               \Yii::$app->session->setFlash("success","添加目录成功");

           }

         }
         $cates= GoodsCategory::find()->asArray()->all();
         $cates=json_encode($cates);

        //显示视图
        return $this->render('add',['model'=>$model,'cates'=>$cates]);

    }



}