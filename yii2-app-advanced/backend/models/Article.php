<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $name
 * @property integer $article_category_id
 * @property string $intro
 * @property integer $status
 * @property string $sort
 * @property integer $inputtime
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_category_id', 'status', 'inputtime'], 'integer'],
            [['intro'], 'string'],
            [['name', 'sort'], 'string', 'max' => 255],
        ];
    }

    public function getArticleCategory(){

        return $this->hasOne(ArticleCategory::className(),['id'=>'article_category_id']);

    }

    public function getArticleDetail(){

        return $this->hasOne(ArticleDetail::className(),['article_id'=>'id']);

    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'article_category_id' => '文章分类',
            'intro' => '简介',
            'status' => '状态',
            'sort' => '排序',
            'inputtime' => '录入时间',
        ];
    }
}
