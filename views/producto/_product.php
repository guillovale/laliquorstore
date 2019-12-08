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
			echo Html::img($image, ['width' => '50px', 'height' => '50px']);
        #}
        ?>
    </div>
    <div class="col-sm-4" style="font-size:11px">
        <h5><?php echo Html::encode(isset($model->categoria->detalle)?$model->categoria->detalle:null) ?></h5>
        <?php echo Markdown::process($model->detalle) ?>
    </div>

    <div class="col-sm-4">
        
            <?= '$'.$model->precio_unidad ?>
            <?= Html::a('comprar', ['cart/add', 'id' => $model->id], ['class' => 'btn btn-success'])?>
        
    </div>
</div>
