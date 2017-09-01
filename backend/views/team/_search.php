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

    <?= $form->field($model, 'champ') ?>

    <?= $form->field($model, 'first') ?>

    <?= $form->field($model, 'second') ?>

    <?= $form->field($model, 'wins') ?>

    <?= $form->field($model, 'draws') ?>

    <?= $form->field($model, 'losses') ?>

    <?= $form->field($model, 'rating') ?>

    <?= $form->field($model, 'since') ?>

    <?= $form->field($model, 'last_played') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
