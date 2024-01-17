<?php

namespace app\models;

use yii\db\ActiveRecord;

class Article extends ActiveRecord
{
    public function getUser()
    {
        return $this->hasMany(User::class, ['id' => 'user_id']);
    }
}
