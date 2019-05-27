<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ViviendasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="viviendas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'propietario_id') ?>

    <?= $form->field($model, 'direccion') ?>

    <?= $form->field($model, 'localidad') ?>

    <?= $form->field($model, 'precio') ?>

    <?php // echo $form->field($model, 'num_habitaciones') ?>

    <?php // echo $form->field($model, 'area') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
