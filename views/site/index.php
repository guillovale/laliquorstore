<?php

/* @var $this yii\web\View */

$this->title = 'LIQUOR';
?>
<div class="site-index">


    <div class="jumbotron">

	<?php
	$images=['<img src="images/combo1.jpg"/>','<img src="images/combo2.jpg"/>','<img src="images/combo3.jpg"/>','<img src="images/combo5.jpg"/>'];
echo yii\bootstrap\Carousel::widget(['options' => ['class' => 'slide', 'style' => 'heigth: 200'],'items'=>$images]);
?>

	<p><a class="btn btn-lg btn-success" href="#">Proveedor</a></p>

	<img src="images/logo.jpg" class="img-thumbnail" alt="Responsive image" width="1200" height="200" >

	
        <h1>Felicidades!</h1>

        <p class="lead">Usted se encuentra en LA LIQUOR STORE.</p>

        
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <p><a class="btn btn-default" href="#">Dirección &raquo;</a></p>
				<p>Francisco Flor 0413 y Sucre</p>

            </div>
            <div class="col-lg-4">
                 <p><a class="btn btn-default" href="#">Contacto &raquo;</a></p>
				  <p>email:</p>
					<p>Teléfono:</p>
            </div>
            <div class="col-lg-4">

                <p><a class="btn btn-default" href="#">Horarios &raquo;</a></p>
				<p>Jueves, Viernes y Sábado de 17:00 a 02:00 hrs.</p>
            </div>
        </div>

    </div>
</div>
