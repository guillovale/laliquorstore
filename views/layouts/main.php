<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">	

	<?php
	$usuario = Yii::$app->user->identity;
	$menuItems = [];
	$menuAdmin = [];
	$menuCliente = [];
	$menuProducto = [];		
	
	array_push($menuItems, ['label' => 'Inicio', 'url' => ['/site/index']]);
	array_push($menuItems, ['label' => 'Catálogo', 'url' => ['/producto/catalogo']]);
	array_push($menuItems, ['label' => 'Promociones', 'url' => ['promocion/index']]);
	#array_push($menuItems, $menuCliente );
	if ($usuario) 
	{
		if ($usuario->rol == 'A') {
			array_push($menuProducto, ['label' => 'Producto', 'url' => ['/producto/index']]);
			array_push($menuProducto, ['label' => 'Tipo Producto', 'url' => ['/tipoproducto/index']]);
			array_push($menuProducto, ['label' => 'Categoría', 'url' => ['categoria/index']]);
			array_push($menuProducto, ['label' => 'Marca', 'url' => ['marca/index']]);
			#array_push($menuAdmin, ['label' => 'Producto', 'items' => $menuProducto]);
			array_push($menuItems, ['label' => 'Producto', 'items' => $menuProducto]);
			
		}
	}
	array_push($menuItems, ['encode'=>false,'label' => '<i class="glyphicon glyphicon-shopping-cart"></i>', 'url' => ['#']]);

	if (Yii::$app->user->isGuest)
		array_push($menuItems, ['encode'=>false, 'label' => '<i class="glyphicon glyphicon-log-in"></i> Ingresar', 'url' => ['/site/login']]);
	else
		array_push($menuItems, [
									'encode'=>false,
								  'label' => '<i class="glyphicon glyphicon-log-out"></i> Salir',
								  'url' => ['site/logout'],
								  'linkOptions' => ['data-method' => 'post'],
								]);
			
	?>	

    <?php
    NavBar::begin([
        'brandLabel' => 'LA LIQUOR STORE',#Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => 
			$menuItems,
        
    ]);

    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
	<?php #echo var_dump(Yii::$app->user); exit; ?>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; zooPC <?= date('Y') ?></p>

        <p class="pull-right"></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
