<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'occasion_id')->textInput() ?>

    <?= $form->field($model, 'location_venue_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'event_type_id')->textInput() ?>

    <?= $form->field($model, 'event')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'event_category_id')->textInput() ?>

    <?= $form->field($model, 'event_status_id')->textInput() ?>

    <?= $form->field($model, 'match_system_id')->textInput() ?>

    <?= $form->field($model, 'sort_id')->textInput() ?>

    <?= $form->field($model, 'min_team')->textInput() ?>

    <?= $form->field($model, 'max_team')->textInput() ?>

    <?= $form->field($model, 'champ')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'second')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_start')->textInput() ?>

    <?= $form->field($model, 'date_end')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
