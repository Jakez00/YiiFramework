<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Register extends Model
{
    public $username;
    public $password;
    public $fullname;

    public function rules()
    {
        return [
            [['username', 'password', 'fullname'], 'required']
        ];
    }

    public function registered()
    {
        
        $user = new User();
        $user->fullname = $this->fullname;
        $user->username = $this->username;
        $user->password = Yii::$app->security->generatePasswordHash($this->password);
        $user->auth_key = Yii::$app->security->generateRandomString();
        $user->access_token = Yii::$app->security->generateRandomString();
        // var_dump($user->attributes);exit;
        $user->save();
        
        return true;

    }
}