<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EventTeamRound */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-team-round-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'event_team_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'event_round_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'match_result_id')->textInput() ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
