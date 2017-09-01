<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TeamSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="team-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'team') ?>

    <?= $form->field($model, 'event_type_id') ?>

    <?= $form->field($model, 'team_status_id') ?>

    <?= $form->field($model, 'champ_first_second') ?>

    <?php // echo $form->field($model, 'win_draw_loss') ?>

    <?php // echo $form->field($model, 'rating') ?>

    <?php // echo $form->field($model, 'since') ?>

    <?php // echo $form->field($model, 'last_played') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
