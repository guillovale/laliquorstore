<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedido';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="font-size:11px" class="producto-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Crear Producto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            #'id',
            'codigo',
			[
				'attribute'=>'tipo',
				'label'=>'Tipo',
				'format'=>'text',//raw, html
				'content'=>function($data){
				return isset($data->tipoproducto->detalle)?$data->tipoproducto->detalle:null;}
			],
			[
				'attribute'=>'categorias',
				'label'=>'Categoría',
				'format'=>'text',
				'content'=>function($data){
					return isset($data->categoria->detalle)?$data->categoria->detalle:null;}
				
			],
			[
				'attribute'=>'marcas',
				'label'=>'Marca',
				'format'=>'text',//raw, html
				'content'=>function($data){
					#echo var_dump($data); exit;
					return isset($data->marca->detalle)?$data->marca->detalle:null;}
			],
            'detalle',
			[
				'attribute'=>'unidad',
				'format'=>'text',//raw, html
				'enableSorting'=>false,
			],
			'precio_compra',
            'precio_unidad',
			'descuento',
			[
				'attribute'=>'url',
				'format'=>'text',//raw, html
				'enableSorting'=>false,
			],
            
            		[
				'attribute'=>'inventario.existencia',
				'label'=>'Existencia',
				'format'=>'text',//raw, html
			],
			
            #'id_categoria',
            #'id_marca',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
