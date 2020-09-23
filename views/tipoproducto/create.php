<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoProducto */

$this->title = 'Crear Tipo Producto';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-producto-create">

	<div style="font-size:12px"  class="col-sm-6">
		<h3><?= Html::encode($this->title) ?></h3>

		<?= $this->render('_form', [
		    'model' => $model,
		]) ?>
	</div>
	<div class="col-sm-6">
		
		<?= Html::a('Ver Productos', ['producto/index'], ['class' => 'profile-link']) ?>

	</div>
</div>
