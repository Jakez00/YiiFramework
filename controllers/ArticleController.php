<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Article;
use app\models\ArticleForm;

class ArticleController extends Controller
{
    public function actionIndex()
    {
        $query = Article::find();

        $pagination = new Pagination([
            'defaultPageSize' => 6,
            'totalCount' => $query->count(),
        ]);

        $articles = $query->orderBy('title')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('articles', [
            'articles' => $articles,
            'pagination' => $pagination,
        ]);
    }

    public function actionArticleform()
    {
        $model = new ArticleForm();
        return $this->render('articleForm', [
                    'model' => $model,
                ]);
    }

    public function actionCreate()
    {
        $model = new ArticleForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $article = new Article();
            $article->title = $model->title;
            $article->slug = $model->title;
            $article->content = $model->content;
            $article->user_id = Yii::$app->user->identity->attributes['id'];
    
            if ($article->save()) {
                return $this->redirect(Yii::$app->homeUrl);
            }
        }
    
        return $this->render('articleForm', [
            'model' => $model,
        ]);
    }

    
    public function actionMyarticle()
    {
        $model = new Article();
       
        return $this->render('register', [
            'model' => $model,
        ]);
    }

}