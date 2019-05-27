<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Viviendas */

$this->title = 'Create Viviendas';
$this->params['breadcrumbs'][] = ['label' => 'Viviendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="viviendas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
