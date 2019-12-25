<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use intermundia\mailer\assets\MailerAsset;

/* @var $this yii\web\View */
/* @var $searchModel intermundia\mailer\models\EmailLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->registerAssetBundle(MailerAsset::class);

$this->title = Yii::t('common', 'Email Logs');
$this->params['breadcrumbs'][] = $this->title;
$model->deleteDate = date("m/d/Y");
?>
<div class="email-log-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="header">
        <div class="header-create">
            <?php echo Html::a(Yii::t('common', 'Create {modelClass}', [
                'modelClass' => 'Email Log',
            ]), ['create'], ['class' => 'btn btn-success']) ?>

        </div>

        <div class="header-date-form">
            <div class="date-form">
                <?php $form = ActiveForm::begin([
                    'action' => ['delete-by-date'],
                    'options' => [
                        'enctype' => 'multipart/form-data',
                        'style' => 'display: flex;'
                    ]
                ]); ?>
                <?php echo $form->field($model, 'deleteDate')->widget(
                    \dosamigos\datepicker\DatePicker::class,
        );
                ?>
            </div>

            <div class="date-form-delete">
                <?= Html::submitButton('Delete', ['class' => 'btn btn-danger']) ?>
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'to',
            'from',
            'cc',
            'bcc',
            'subject',
            // 'message:ntext',
            // 'status',
            'created_at:date',
            // 'error_message:ntext',
            // 'trace:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
