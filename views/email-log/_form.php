<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model intermundia\mailer\models\EmailLog */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="email-log-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'to')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'from')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'cc')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'bcc')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'message')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'created_at')->textInput() ?>

    <?php echo $form->field($model, 'error_message')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'trace')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('common', 'Create') : Yii::t('common', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
