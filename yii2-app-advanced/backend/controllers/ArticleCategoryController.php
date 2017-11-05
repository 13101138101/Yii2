<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/11/4
 * Time: 16:23
 */

namespace backend\controllers;


use backend\models\ArticleCategory;
use backend\models\ArticleDetail;
use yii\web\Controller;

class ArticleCategoryController extends Controller
{
    public function actionIndex(){
        $users=ArticleCategory::find()->all();



        return $this->render('index',['users'=>$users]);
    }

    public function actionAdd(){
        $model=new ArticleCategory();

        $request=\Yii::$app->request;

        if($request->isPost){

            if($model->load($request->post())&&$model->validate()){

                $model->save();

                $session=\Yii::$app->session;

                $session->setFlash('success',"添加成功");

                return  $this->redirect('index');
            }else{
                var_dump($model->getErrors());exit;
            }

        }
              return $this->render('add',['model'=>$model]);
    }

    //编辑分类
    public function actionEdit($id){

        $model=ArticleCategory::findOne($id);

        $request=\Yii::$app->request;

        if($request->isPost){

            if($model->load($request->post())&&$model->validate()){

                $model->save();

                $session=\Yii::$app->session;

                $session->setFlash('success',"添加成功");

                return  $this->redirect('index');
            }else{
                var_dump($model->getErrors());exit;
            }

        }
        return $this->render('edit',['model'=>$model]);

    }

    //删除
    public function actionDel($id){

        $model=ArticleCategory::findOne($id);

        $model->delete();

        return $this->redirect('index');

    }



}