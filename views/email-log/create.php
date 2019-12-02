<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model intermundia\mailer\models\EmailLog */

$this->title = Yii::t('common', 'Create {modelClass}', [
    'modelClass' => 'Email Log',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Email Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-log-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
