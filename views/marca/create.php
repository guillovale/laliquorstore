<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Marca */

$this->title = 'Crear Marca';
$this->params['breadcrumbs'][] = ['label' => 'Marcas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marca-create">

    <h3><?= Html::encode($this->title) ?></h3>

	<div style="font-size:12px"  class="col-sm-6">

		<?= $this->render('_form', [
		    'model' => $model,
		]) ?>
	</div>
	<div class="col-sm-6">
		
		<?= Html::a('Ver Productos', ['producto/index'], ['class' => 'profile-link']) ?>

	</div>
</div>
