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

    <?= $form->field($model, 'team_status_id')->textInput() ?>

    <?= $form->field($model, 'champ')->textInput() ?>

    <?= $form->field($model, 'first')->textInput() ?>

    <?= $form->field($model, 'second')->textInput() ?>

    <?= $form->field($model, 'wins')->textInput() ?>

    <?= $form->field($model, 'draws')->textInput() ?>

    <?= $form->field($model, 'losses')->textInput() ?>

    <?= $form->field($model, 'rating')->textInput() ?>

    <?= $form->field($model, 'since')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_played')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
