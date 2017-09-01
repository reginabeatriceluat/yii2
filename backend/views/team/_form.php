<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Team */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="team-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'team')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'event_type_id')->textInput() ?>

    <?= $form->field($model, 'team_status_id')->textInput() ?>

    <?= $form->field($model, 'champ_first_second')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'win_draw_loss')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rating')->textInput() ?>

    <?= $form->field($model, 'since')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_played')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
