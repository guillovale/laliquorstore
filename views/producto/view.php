<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */

$this->title = 'Producto';
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="producto-view">
	
	<h3><?= Html::encode($this->title) ?></h3>    
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
      

      <div class="col-sm-8">	

		
		<?= DetailView::widget([
		    'model' => $model,
		    'attributes' => [
		        #'id',
		        'codigo',
				[
					'attribute'=>'tipoproducto.detalle',
					'label'=>'Tipo',
					'format'=>'text',//raw, html
					#'content'=>function($data){
					#	echo var_dump($data); exit;
					#	return isset($model->tipoproducto->detalle)?$data->tipoproducto->detalle:null;}
				],
				[
					'attribute'=>'categoria.detalle',
					'label'=>'Categoría',
					'format'=>'text',
					#'content'=>function($data){
					#	return isset($data->categoria->detalle)?$data->categoria->detalle:null;}
					
				],
				[
					'attribute'=>'marca.detalle',
					'label'=>'Marca',
					'format'=>'text',//raw, html
					#'content'=>function($data){
						#echo var_dump($data); exit;
					#	return isset($data->marca->detalle)?$data->marca->detalle:null;}
				],
		        'detalle',
		        'unidad',
		        'precio_compra',
		        'precio_unidad',
		        'descuento',
		        #'id_categoria',
		        #'id_marca',
				'url',
				[
					'attribute'=>'inventario.existencia',
					'label'=>'Existencia',
					'format'=>'text',//raw, html
				],
		    ],
		]) ?>

	</div>
	<div class="col-sm-4">
		<?php echo Html::img('@web/'. $model->url, ['class' => 'pull-left img-responsive', 'width' => '305']); ?>
	</div>

</div>
