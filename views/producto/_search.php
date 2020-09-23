<?php

use yii\helpers\Html;
#use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\ProductoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-search">

    <?php $form = ActiveForm::begin([
	 'layout' => 'inline',
        'action' => ['catalogo'],
        'method' => 'get',
    ]); ?>

   <?= $form->field($model, 'detalle') ?>
	
   <?php // echo $form->field($model, 'id_categoria') ?>

   <?php // echo $form->field($model, 'id_marca') ?>

    <div class="form-group">
	
        <?php echo Html::submitButton('<span class="glyphicon glyphicon-search"></span>', ['class' => 'btn btn-primary']) ?>
	
        <?php #echo  Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
