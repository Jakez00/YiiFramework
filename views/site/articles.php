<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Article Management';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Articles</h1>
    </div>

    <div class="body-content">

        <div class="row justify-content-center">
            <?php foreach ($articles as $article): ?>
                <div class="col-lg-3 mb-3 border border-1 p-3 mx-2 border">
                    <h2><?= $article->title ?></h2>

                    <p><?= $article->content ?></p>
                    <div class="mt-5">
                        <p class="mb-0"><?=$article->user[0]->fullname?></p>
                        <p style="font-size:12px;">Author</p>
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
