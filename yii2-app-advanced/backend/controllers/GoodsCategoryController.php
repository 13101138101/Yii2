<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/11/5
 * Time: 14:40
 */

namespace backend\controllers;


use backend\models\GoodsCategory;
use yii\web\Controller;
//上传图片配置
use flyok666\qiniu\Qiniu;

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
                   $cateParent=GoodsCategory::findOne(['id'=>$model->parent_id]);
//var_dump($cateParent);exit;
                   //把当前节点对象添加到父类对象中
                   $model->prependTo($cateParent);

               }
               \Yii::$app->session->setFlash("success","修改目录成功");

               $this->redirect(['index']);

           }

         }
         $cates= GoodsCategory::find()->asArray()->all();
         $cates[]=['id'=>0,'parent_id'=>0,'name'=>"选择分类"];
         $cates=json_encode($cates);

        //显示视图
        return $this->render('add',['model'=>$model,'cates'=>$cates]);

    }

 
    //编辑

    /**
     * @return string
     */
    public function actionEdit(){
        $request = \yii::$app->request;

        $id = $request->get('id');

        $model=GoodsCategory::findOne($id);

        $cates= GoodsCategory::find()->asArray()->all();

        $request=\Yii::$app->request;

        if($request->isPost){

            $model->load($request->post());

            if($model->validate()){

                if($model->parent_id==0){

                    $model->save();

                }else{
                    //创建子节点

                    //1,把父节点找到
                    $cateParent=GoodsCategory::findOne(['id'=>$model->parent_id]);
                    //把当前节点对象添加到父类对象中
                    $model->prependTo($cateParent);


                }
                \Yii::$app->session->setFlash("success","添加目录成功");
                $this->redirect(['index']);
            }

        }

        $cates=json_encode($cates);

        //显示视图
        return $this->render('edit',['model'=>$model,'cates'=>$cates]);

    }

    //删除
    public function actionDel($id){
        $model=GoodsCategory::findOne($id);

        $model->deleteWithChildren();

        $this->redirect(['index']);

    }




    //上传图片配置
    public function actionUpload(){

        //配置
        $config = [
            'accessKey'=>'gch1TZjeRAG5E1MEcytHCtM2dBfy1t085UyfZTuV',//ak
            'secretKey'=>'wNywXo8zJcQGN8zgAWyOYiXggO-REC_0TrPdoUOA',//sk
            'domain'=>'http://oz1dxim9q.bkt.clouddn.com/',//域名
            'bucket'=>'wanghao',//空间名称
            'area'=>Qiniu::AREA_HUANAN//区域
        ];

        //实例化对象
        $qiniu = new Qiniu($config);
        $key = time();
        //调用上传方法
        $qiniu->uploadFile($_FILES['file']['tmp_name'],$key);
        $url = $qiniu->getLink($key);

        $info=[
            'code'=>0,
            'url'=>$url,
            'attachment'=>$url,
        ];
        return  json_encode($info);

    }

}