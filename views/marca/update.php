<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Marca */

$this->title = 'Actualizar Marca:';
$this->params['breadcrumbs'][] = ['label' => 'Marcas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="marca-update">

    <h3><?= Html::encode($this->title) ?></h3>
	<div style="font-size:12px"  class="col-sm-8">
		<?= $this->render('_form', [
		    'model' => $model,
		]) ?>
	</div>
	<div class="col-sm-4">
		
		<?= Html::a('Ver Productos', ['producto/index'], ['class' => 'profile-link']) ?>

	</div>

</div>
