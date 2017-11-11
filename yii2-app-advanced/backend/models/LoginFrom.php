<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/11/9
 * Time: 15:32
 */

namespace backend\models;


use yii\base\Model;

class LoginFrom extends Model
{
    public $username;
    public $password;
    //记住密码账号
    public $rememberMe = true;

    public function rules()
    {
        return[
            [['password','username'],'required'],


        ];
    }

    public function attributeLabels()
    {
        return [
            'password'=>"密码",
            'username'=>"账号",
            'rememberMe'=>"记住我",
        ];
    }

}