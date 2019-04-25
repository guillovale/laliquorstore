<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Menu;
/* @var $this yii\web\View */
$title = $category === null ? 'Bienvenido!' : $category->detalle;
$this->title = Html::encode($title);
?>
<?= Html::img('images/logo.jpg', ['width' => '60px']); ?>
<h2><?= Html::encode($title) ?></h2>

<div class="container-fluid">
  <div class="row">
      <div class="col-xs-4">
          <?php # Menu::widget([
              #'items' => $menuItems,
              #'options' => [
              #    'class' => 'menu',
              #],
          #]) ?>
      </div>
      <div class="col-xs-8">
          <?= ListView::widget([
              'dataProvider' => $productsDataProvider,
              'itemView' => '_product',
          ]) ?>
      </div>
  </div>
</div>
