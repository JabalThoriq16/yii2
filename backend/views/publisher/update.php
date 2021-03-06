<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Publishers */

$this->title = 'Update Publishers: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Publishers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'publisher_id' => $model->publisher_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="publishers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
