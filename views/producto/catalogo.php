<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Menu;
/* @var $this yii\web\View */
$title = $category === null ? 'Catálogo:' : $category->detalle;
$this->title = Html::encode($title);
#echo var_dump($menuItems); exit;
?>

<div class="container-fluid">
  <div class="row">
	
	<div class="float-right">
    <?php #echo Html::img('images/logo.jpg', ['width' => '60px']); ?>
	
	<?php echo $this->render('_search', ['model' => $searchModel]); ?>
	
	</div>
	  

      <div class="col-sm-8">
          <?= ListView::widget([
              'dataProvider' => $dataProvider,
              'itemView' => '_product',
          ]) ?>
      </div>

	<div class="col-sm-4">
          <?php echo Menu::widget([
              'items' => $menuItems,
              'options' => [
                  'class' => 'menu',
              ],
          ]) ?>
      </div>
  </div>
</div>
