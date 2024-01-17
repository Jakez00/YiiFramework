<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Article Management';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">My Articles</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <?php foreach ($articles as $article): ?>
                <div class="col-lg-4 mb-3 border border-1 p-3 mx-2">
                    <h2><?= $article->title ?></h2>
                    <p><?= $article->content ?></p>
                    <div class="text-right">
                        <?= Html::a('Edit', ['edit', 'id' => $article->id], [
                            'class' => 'btn btn-primary px-4',
                            'data' => [
                                'method' => 'post',
                            ],
                        ])?>
                        <?= Html::a('Delete', ['delete', 'id' => $article->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ])?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php 
            echo LinkPager::widget([
                'pagination' => $pagination,
            ]);
        ?>
    </div>
</div>
