<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ArticleForm extends Model
{
    public $title;
    public $content;

    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            ['content', 'string'],
        ];
    }

    public static function article()
    {
        return 'article';
    }
}