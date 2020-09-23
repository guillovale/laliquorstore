<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TipoProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipo Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="font-size:12px" class="tipo-producto-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Crear Tipo Producto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'detalle',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
