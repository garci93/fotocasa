<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ViviendasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Viviendas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="viviendas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Viviendas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'propietario_id',
            'direccion',
            'localidad',
            'precio',
            //'num_habitaciones',
            //'area',

            [
                'class' => 'yii\grid\ActionColumn',
                'visibleButtons' => [
                    'update' => function ($model, $key, $index) {
                        return $model->id % 2 == 0;
                    },
                ],
            ],
        ],
    ]); ?>


</div>
