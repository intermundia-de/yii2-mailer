<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel intermundia\mailer\models\EmailLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common', 'Email Logs');
$this->params['breadcrumbs'][] = $this->title;
$model->deleteDate = date("m/d/Y");
?>
<div class="email-log-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a(Yii::t('common', 'Create {modelClass}', [
            'modelClass' => 'Email Log',
        ]), ['create'], ['class' => 'btn btn-success']) ?>

        <?php $form = ActiveForm::begin([
            'action' => ['delete-by-date'],
            'options' => [
                'enctype' => 'multipart/form-data'
            ]
        ]); ?>
        <?php echo $form->field($model, 'deleteDate')->widget(
            \dosamigos\datepicker\DatePicker::class,
        );
        ?>

        <?php echo Html::a(Yii::t('common', 'Delete'), ['delete-by-date', 'date' => $model->deleteDate], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('common', 'Are you sure you want to delete logs?'),
                'method' => 'post',
            ],
        ]) ?>
        <?php ActiveForm::end() ?>
    </p>

    <?php ?>

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
