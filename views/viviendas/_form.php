<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Viviendas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="viviendas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'propietario_id')->textInput() ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'localidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'precio')->textInput() ?>

    <?= $form->field($model, 'num_habitaciones')->textInput() ?>

    <?= $form->field($model, 'area')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
