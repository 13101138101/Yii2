<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/11/4
 * Time: 11:59
 */

namespace backend\controllers;




use backend\models\Article;
use backend\models\ArticleCategory;
use backend\models\ArticleDetail;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class ArticleController extends Controller
{

    public function actionIndex(){
        $users=Article::find()->all();

        return $this->render('index',['users'=>$users]);

    }

 //添加
    public function actionAdd(){
        $model = new Article();
        $articleDetail =new ArticleDetail();
        $request=\Yii::$app->request;

        if($request->isPost){

            if($model->load($request->post())&&$model->validate()){

//        var_dump($request->post());exit;
               $model->inputtime=time();

               $model->save();

                       if($model->load($request->post())&& $model->validate()){

                       $articleDetail->load($request->post());

                       $articleDetail->article_id=$model->id;

                       $articleDetail->save();

                           $session=\Yii::$app->session;
                           $session->setFlash('success',"添加成功");

                           return $this->redirect(['index']);
                       }


            }else{
                var_dump($model->getErrors());exit;

            }
        }

        $article=ArticleCategory::find()->all();

        $options = ArrayHelper::map($article, 'id', 'name');


        return $this->render('add',['model'=>$model,'options'=>$options,'detail'=>$articleDetail]);
    }

    //编辑
    public function actionEdit($id,$article_id){

        $model=Article::findOne($id);

        $detail=ArticleDetail::findOne($article_id);

        $request=\Yii::$app->request;

        if($request->isPost){

            if($model->load($request->post())&&$model->validate()){

//                $model->inputtime=time();

                $model->save();

                $detail->load($request->post());
//        var_dump($request->post());exit;
                $detail->save();
                $session=\Yii::$app->session;

                $session->setFlash('success',"修改成功");

                return $this->redirect('index');
            }else{
                var_dump($model->getErrors());exit;

            }
        }

        $article=ArticleCategory::find()->all();

        $options = ArrayHelper::map($article, 'id', 'name');

        return $this->render('edit',['model'=>$model,'options'=>$options,'detail'=>$detail]);


    }


    //删除
    public function actionDel($id){
        $model=Article::findOne($id);

        $model->delete();

        return $this->redirect('index');

    }


    //查看全部内容
    public function actionContent($id){

        $model=ArticleDetail::findOne($id);

      return $this->render('content',['model'=>$model]);

    }

}