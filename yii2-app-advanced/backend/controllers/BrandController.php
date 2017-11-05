<?php

namespace backend\controllers;

use backend\models\Brand;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\UploadedFile;


class BrandController extends Controller
{
    //验证码
    public function actions()
    {
        return [

            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'minLength' => 3,//必需设置3或以上
                'maxLength' => 4,
                'width'=>200,

            ],

        ];
    }


    //数据分页


    public function actionIndex()
    {

        $count = Brand::find()->count();

        $pageSize = 8;

        $page = new Pagination(
            [
                'pageSize'=>$pageSize,
                'totalCount'=>$count,
            ]

        );

        $users=Brand::find()->limit($page->limit)->offset($page->offset)->all();
//       var_dump($users);exit;
        return $this->render('index',['users'=>$users,'page'=>$page]);
    }

    //添加信息

    /**
     * @return string
     */
    public function actionAdd(){
         $model=new Brand();

         $request=\Yii::$app->request;

         if($request->isPost){

             if($model->load($request->post())){
                 $model->imgFile=UploadedFile::getInstance($model,'imgFile');

                 if($model->validate()){

                    if ($model->imgFile) {

                       $filePath = "images/" . time() . "." . $model->imgFile->extension;

                         $filePath="images/".time().".".$model->imgFile->extension;

                         $model->imgFile->saveAs($filePath, false);

                         $model->logo= $filePath;
                     }
                     $model->save(false);

                     \Yii::$app->session->setFlash("success", "添加成功");

                     $this->redirect('index');
                 }else{
                     var_dump($model->getErrors());
                     exit;

                 }
             }
         }
        return $this->render('add', ['model' => $model]);
    }

    //修改数据
    public function actionEdit($id){

        $model=Brand::findOne($id);

        $request=\Yii::$app->request;

        if($request->isPost){

            if($model->load($request->post())){
                $model->imgFile=UploadedFile::getInstance($model,'imgFile');

                if($model->validate()){

                    if ($model->imgFile) {

                        $filePath = "images/" . time() . "." . $model->imgFile->extension;

                        $filePath="images/".time().".".$model->imgFile->extension;

                        $model->imgFile->saveAs($filePath, false);

                        $model->logo= $filePath;
                    }
                    $model->save(false);

                    \Yii::$app->session->setFlash("success", "添加成功");

                    $this->redirect('index');
                }else{
                    var_dump($model->getErrors());
                    exit;

                }
            }
        }
        return $this->render('edit', ['model' => $model]);
    }


    //删除
    public function actionDel($id){

        $model=Brand::findOne($id);

        $model->delete();

        return $this->redirect('index');



    }



}
