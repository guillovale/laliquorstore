<?php

use yii\helpers\Html;
use yii\widgets\Menu;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */

$this->title = 'Crear Producto';
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$menuItems = [];
array_push($menuItems, ['label' => 'Tipo', 'url' => ['tipoproducto/index']]);
array_push($menuItems, ['label' => 'Categoría', 'url' => ['categoria/index']]);
array_push($menuItems, ['label' => 'Marca', 'url' => ['marca/index']]);

?>
<div class="producto-create">

    <h3><?= Html::encode($this->title) ?></h3>

	
      
      <div style="font-size:12px"  class="col-sm-8">
          <?= $this->render('_form', [
        	'model' => $model,
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
