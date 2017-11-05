<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/11/4
 * Time: 15:52
 */

namespace backend\controllers;


use backend\models\ArticleDetail;
use yii\web\Controller;

class ArticleDetailController extends Controller
{

    public function actionIndex(){

        $users=ArticleDetail::find()->all();

       return $this->render('index',['users'=>$users]);

    }

}