<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/11/7
 * Time: 14:27
 */

namespace backend\controllers;


use backend\models\Brand;
use backend\models\Goods;
use backend\models\GoodsCategory;
use backend\models\GoodsDayCount;
use backend\models\GoodsGallery;
use backend\models\GoodsIntro;
use yii\base\Controller;
use yii\helpers\ArrayHelper;

class GoodsController extends \yii\web\Controller
{
    //显示
    public function actionIndex()
    {
        $users = Goods::find()->all();
//    var_dump($users);exit;
        return $this->render('index', ['users' => $users]);
    }

    //添加商品
    public function actionAdd()
    {
        $model = new Goods();

        $gallery = new GoodsGallery();

        $intro = new GoodsIntro();


        //查出商品的分类
        $goods = GoodsCategory::find()->all();

        $options = ArrayHelper::map($goods, 'id', 'name');

        $time = date("Ymd", time());

        //查出每天添加商品的条数
        $count = GoodsDayCount::findOne($time);

        $request = \Yii::$app->request;

//        var_dump($request);exit;
        //查出所有品牌
        $brands = Brand::find()->all();

        $brand = ArrayHelper::map($brands, 'id', 'name');

        if ($request->isPost) {

            if ($model->load($request->post()) && $model->validate()) {

                $model->sn = $time . $count->count;

                $model->inputtime = time();

                $model->save();

                if ($intro->load($request->post())) {

                    //保存描述
                    $intro->goods_id = $model->id;
                    $intro->save();

                    if ($gallery->load($request->post())) {


                        //保存图片
                        foreach ($gallery->path as $imgFile) {
                            $gallery = new GoodsGallery();
                            $gallery->goods_id = $model->id;
                            $gallery->path = $imgFile;
                            $gallery->save();
                        }


                    }

                }

                \Yii::$app->session->setFlash("success", "添加成功");

            } else {
                var_dump($model->getErrors());
                exit;
            }
        }
        return $this->render('add', ['model' => $model, 'options' => $options, 'brand' => $brand, 'gallery' => $gallery, 'intro' => $intro]);
    }

    //编辑

    /**
     * @param $id
     * @return string
     */
    public function actionEdit($id)
    {
        $model = Goods::findOne($id);
        $intro = GoodsIntro::findOne($id);
        $gallery = new GoodsGallery();

        $request = \Yii::$app->request;
        $goods = GoodsCategory::find()->all();
        $options = ArrayHelper::map($goods, 'id', 'name');

        $time = date("Ymd", time());

        //查出每天添加商品的条数
        $count = GoodsDayCount::findOne($time);

        //查出所有品牌
        $brands = Brand::find()->all();
        $brand = ArrayHelper::map($brands, 'id', 'name');

        if ($request->isPost) {

            if ($model->load($request->post()) && $model->validate()) {

                $model->sn = $time . $count->count;
                $model->inputtime = time();
                $model->save();

                if ($intro->load($request->post())) {

                    //保存描述
                    $intro->goods_id = $model->id;
                    $intro->save();

                    if ($gallery->load($request->post())) {
                        //保存图片
                        foreach ($gallery->path as $imgFile) {
                            $gallery = new GoodsGallery();
                            $gallery->goods_id = $model->id;
                            $gallery->path = $imgFile;
                            $gallery->save();
                        }
                    }
                }
                \Yii::$app->session->setFlash("success", "添加成功");
            } else {
                var_dump($model->getErrors());
                exit;
            }
        }
      $path = GoodsGallery::find()->where(['goods_id'=>$id])->all();
//        var_dump($path);exit;
        foreach ($path as $v){
            $gallery->imgFile[]=$v->path;
        }

        return $this->render('edit', ['model' => $model, 'options' => $options, 'brand' => $brand, 'gallery' => $gallery, 'intro' => $intro]);

    }

//删除
    public function actionDel($id){
        //删除商品
        Goods::findOne($id)->delete();
        //删除描述
        GoodsIntro::findOne($id)->delete();
        //删除图片
        GoodsGallery::deleteAll(['goods_id'=>$id]);
        //跳转
        return $this->redirect(['index']);

    }

}