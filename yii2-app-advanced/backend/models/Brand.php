<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/11/3
 * Time: 20:34
 */

namespace backend\models;


use yii\db\ActiveRecord;

class Brand extends ActiveRecord
{
public $imgFile;

     public function rules()
     {
         return [
             [['intro'], 'string'],
             [['sort', 'status'], 'integer'],
             [['name'], 'string', 'max' => 30],

             [['imgFile'],'file','extensions' => ['gif','png','jpg'],'skipOnEmpty' => true],


         ];
     }

}