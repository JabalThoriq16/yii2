<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PublishersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Publishers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publishers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Publishers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'publisher_id',
            'name',
            'email:email',
            'address:ntext',
            'phone_number',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Publishers $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'publisher_id' => $model->publisher_id]);
                 }
            ],
        ],
    ]); ?>


</div>
