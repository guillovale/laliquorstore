<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */
/* @var $form yii\widgets\ActiveForm */

$tipo = $this->params['tipo'];
$categoria = $this->params['categoria'];
$marca = $this->params['marca'];

?>

<div class="producto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigo')->textInput() ?>

	<?= $form->field($model, 'id_tipo')->dropDownList($tipo,['prompt'=>'Elija...']) ?>
	
	<?= $form->field($model, 'id_categoria')->dropDownList($categoria,['prompt'=>'Elija...']) ?>

    <?= $form->field($model, 'id_marca')->dropDownList($marca,['prompt'=>'Elija...']) ?>

    <?= $form->field($model, 'detalle')->textInput() ?>

    <?= $form->field($model, 'unidad')->textInput() ?>

    <?= $form->field($model, 'precio_compra')->textInput() ?>

    <?= $form->field($model, 'precio_unidad')->textInput() ?>

    <?= $form->field($model, 'descuento')->textInput() ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Grabar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
