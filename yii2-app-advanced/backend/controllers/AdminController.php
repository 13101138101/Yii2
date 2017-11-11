<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/11/9
 * Time: 10:47
 */

namespace backend\controllers;


use backend\models\Admin;
use backend\models\LoginFrom;
use yii\filters\AccessControl;
use yii\web\Controller;


class AdminController extends Controller
{
    public function actionIndex(){


      return $this->render('index');
    }


    /**
     * @return string
     */
    public function actionAdd(){
        $admin=new Admin();
        $request=\Yii::$app->request;
      if($request->isPost){
        if($admin->load($request->post()) && $admin->validate()){

            //加密
            //密码
            $admin->password=\Yii::$app->security->generatePasswordHash($admin->password);
            //令牌
            $admin->token=\Yii::$app->security->generateRandomString();
            //令牌创建时间
            $admin->token_create_time=time();
            $admin->add_time=time();
            $admin->save();

            \Yii::$app->session->setFlash("success","创建成功");
            \Yii::$app->user->login($admin,3600*24*7);
            return $this->redirect(['index']);

        }else{
            var_dump($admin->getErrors());exit;
        }
    }

        return $this->render('add',['admin'=>$admin]);
    }

//登陆
    public function actionLogin(){

        $model=new LoginFrom();

        $request=\Yii::$app->request;
        if($request->isPost){
            //数据绑定
            $model->load($request->post());
            if($model->validate()){
                //判断有没有用户名
                $admin=Admin::findOne(['username'=>$model->username]);
                if($admin){
                    //判断密码是否正确
                    if(\Yii::$app->security->validatePassword($model->password,$admin->password)){
                        \Yii::$app->user->login($admin,$model->rememberMe?3600*24*7:0);
                        return  $this->redirect(['index']);
                    }else{
                        \Yii::$app->session->setFlash("success","密码错误");
                        return  $this->redirect(['login']);
                    }

                }else{
                    \Yii::$app->session->setFlash("success","用户不存在");
                    return  $this->redirect(['login']);
                }
            }
        }
        return $this->render('login', ['model' => $model]);
    }


  /*  public function behaviors(){
        return[
            'ACF'=>[
                'class'=>AccessControl::className(),
                'only'=>['login','logout','index','add'],
                'rules' => [
                    [
                        'allow'=> true,
                        'actions'=> ['login','index'],
                        'roles'=>['?'],
                    ],
                    [
                        'allow'=> true,
                        'actions'=> ['logout','add'],
                        'roles'=>['@'],
                    ],
                ]
            ],
        ];

    }*/

}