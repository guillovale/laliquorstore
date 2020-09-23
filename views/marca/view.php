<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Marca */

$this->title = 'Marca';
$this->params['breadcrumbs'][] = ['label' => 'Marcas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="marca-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <div class="col-sm-8">
		<p>
		    <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
		    <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
		        'class' => 'btn btn-danger',
		        'data' => [
		            'confirm' => 'Desea eliminar el registro?',
		            'method' => 'post',
		        ],
		    ]) ?>
		</p>

		<?= DetailView::widget([
		    'model' => $model,
		    'attributes' => [
		        'id',
		        'detalle:ntext',
		    ],
		]) ?>
	</div>

</div>
