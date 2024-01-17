<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */


use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

?>
<div class="myarticle-update">
    <?php $form = ActiveForm::begin(['action' => ['myarticle/update', 'id' => $articles->id]]); ?>
        <?= $form->field($model, 'title')->textInput(['value' => $articles->title, 'placeholder' => 'Enter your title']) ?>

        <?= $form->field($model, 'content')->textarea(['rows' => 6,'value' => $articles->content]) ?>
    <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
