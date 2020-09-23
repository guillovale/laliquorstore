<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TipoProducto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipo-producto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'detalle')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Grabar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
