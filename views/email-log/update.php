<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model intermundia\mailer\models\EmailLog */

$this->title = Yii::t('common', 'Update {modelClass}: ', [
    'modelClass' => 'Email Log',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Email Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('common', 'Update');
?>
<div class="email-log-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
