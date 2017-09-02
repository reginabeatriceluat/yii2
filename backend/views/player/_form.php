<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Gender;
use common\models\Team;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Player */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="player-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'e.g. John Smith'])->label('Full Name') ?>

    <?= $form->field($model, 'gender_id')->radioList(
        ArrayHelper::map(Gender::find()->orderBy('id')->all(),'id','gender')
    )->label('Gender')
    ?>

    <?= $form->field($model, 'team_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Team::find()->orderBy('id')->all(),'id','team'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select a Team ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
