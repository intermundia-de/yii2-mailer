<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use intermundia\mailer\assets\MailerAsset;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel intermundia\mailer\models\EmailLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->registerAssetBundle(MailerAsset::class);

$this->title = Yii::t('common', 'Email Logs');
$this->params['breadcrumbs'][] = $this->title;
$model->deleteDate = date("m/d/Y");
$success = Yii::$app->session->get('mailer-success');
?>
<div class="email-log-index">

    <?php if ($success): ?>
        <div class="alert alert-success  alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo $success; ?>
            <?php Yii::$app->session->remove('mailer-success'); ?>
        </div>
    <?php endif; ?>
    <div class="mailer-header">
        <div class="mailer-header-date-form">
            <div class="mailer-date-form">
                <?php $form = ActiveForm::begin([
                    'action' => ['delete-by-date'],
                    'options' => [
                        'enctype' => 'multipart/form-data',
                        'style' => 'display: flex;'
                    ]
                ]); ?>
                <?php echo $form->field($model, 'deleteDate')->widget(
                    \dosamigos\datepicker\DatePicker::class);
                ?>

                <div class="mailer-date-form-delete">
                    <?= Html::submitButton('Delete', ['class' => 'btn btn-danger']) ?>
                </div>
                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'format' => 'raw',
                'attribute' => 'status',
                'value' => function ($model) {
                    if ($model->status === \intermundia\mailer\models\EmailLog::STATUS_SENT) {
                        return "<span class='glyphicon glyphicon-ok text-success'></span>";
                    }
                    return "<span class='glyphicon glyphicon-remove text-danger'></span>";
                },
                'filter' => \intermundia\mailer\models\EmailLog::statuses()
            ],
            'to',
            'from',
            'cc',
            'bcc',
            'subject',
            // 'message:ntext',
            // 'status',
            'created_at:datetime',
            // 'error_message:ntext',
            // 'trace:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',
                            ['view', 'id' => $key, 'ajax' => true],
                            [
                                'class' => 'view-modal-click grid-action',
                                'title' => Yii::t('yii2-mailer', 'View')
                            ]
                        );
                    }
                ]
            ],
        ],
    ]); ?>

</div>


<?php
$view = Yii::t('yii2-mailer', 'View');
Modal::begin([
    'header' => "<h4>$view</h4>",
    'id' => 'view-modal',
    'size' => 'modal-lg'
]);

echo "<div id='viewModalContent'></div>";

Modal::end();

$this->registerJs("
        $(function () {
            $('.view-modal-click').click(function (ev) {
                ev.preventDefault();
                $('#view-modal')
                    .modal('show')
                    .find('#viewModalContent')
                    .load($(this).attr('href'));
            });
        });
    ");
?>
