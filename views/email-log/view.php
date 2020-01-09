<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model intermundia\mailer\models\EmailLog */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Email Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-log-view">

   <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'to',
            'from',
            'cc',
            'bcc',
            'subject',
            'message:ntext',
            'status',
            'created_at:datetime',
            'error_message:ntext',
            'trace:ntext',
        ],
    ]) ?>

</div>
