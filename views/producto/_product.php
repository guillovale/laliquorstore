<?php
use yii\helpers\Html;
use yii\helpers\Markdown;
?>
<?php /** @var $model \common\models\Product */ ?>
<div class="col-sm-12 well">
    <div class="col-sm-4">
        <?php
        $image = $model->url;
        #if (isset($images[0])) {
            # echo Html::img($images[0]->getUrl(), ['width' => '100%']);
			echo Html::img($image, ['width' => '50%']);
        #}
        ?>
    </div>
    <div class="col-sm-4">
        <h4><?php echo Html::encode(isset($model->categoria->detalle)?$model->categoria->detalle:null) ?></h4>
        <?php echo Markdown::process($model->detalle) ?>
    </div>

    <div class="col-sm-4">
        
            <?= '$'.$model->precio_unidad ?>
            <?= Html::a('comprar', ['#', 'id' => $model->id], ['class' => 'btn btn-success'])?>
        
    </div>
</div>
