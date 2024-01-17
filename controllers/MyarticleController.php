<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Article;
use app\models\ArticleForm;

class MyarticleController extends Controller
{
    public function actionIndex()
    {
        $query = Article::find()->where(['user_id' => Yii::$app->user->identity->attributes['id']]);

        $pagination = new Pagination([
            'defaultPageSize' => 6,
            'totalCount' => $query->count(),
        ]);

        $articles = $query
            ->orderBy('title')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('myarticles', [
            'articles' => $articles,
            'pagination' => $pagination,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        }
    }
    
    public function actionEdit($id)
    {
        $model = new ArticleForm();
        $article = Article::findOne($id);
        return $this->render('editarticles', [
            'model' => $model,
            'articles' => $article
        ]);
    }

    
    public function actionUpdate($id)
    {
        $model = new ArticleForm();
        $article = Article::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
            $article->title = $model->title;
            $article->slug = $model->title;
            $article->content = $model->content;
        }
        if ($article->save()) {
            return $this->redirect(['index']);
        }
    }
}