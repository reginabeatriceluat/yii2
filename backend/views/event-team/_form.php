<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EventTeam */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-team-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'event_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'team_event_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'event_team_status_id')->textInput() ?>

    <?= $form->field($model, 'team_order')->textInput() ?>

    <?= $form->field($model, 'total_wins')->textInput() ?>

    <?= $form->field($model, 'total_draws')->textInput() ?>

    <?= $form->field($model, 'total_loss')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
