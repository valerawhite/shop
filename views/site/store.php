<?php
use yii\helpers\Html;
$i = 0;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Electro - HTML Ecommerce Template</title>

 		

    </head>
	<body>
	
		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<?php  foreach($all_category_not_limit as $models) {?>
						<li class="active"><?= Html::a($models->name_category, ['store', 'id' => $models->id_cat]) ?></li>
						<?php } ?>
					
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						

				

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Популярные товары</h3>
							<?php foreach($result as $results) {  ?>
							<div class="product-widget">
								<div class="product-img">
									<img src="../<?= $results['picture'] ?>" alt="">
								</div>
								<div class="product-body">
									<p class="product-category"><?= $results['name_category'] ?></p>
									<h3 class="product-name"><a href="buy?id=<?= $results['id_product'] ?>"><?= $results['name_product'] ?></a></h3>
									<h4 class="product-price"><?= $results['price'] ?> <del class="product-old-price"><?= $results['price'] ?></del></h4>
								</div>
							</div>
							<?php } ?>
					
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
			

						<!-- store products -->
						<div class="row">
							<!-- product -->
								<?php  foreach($model as $models) { $i++; ?>
								
								
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="../<?= $models->picture ?>" alt="Image">
										<div class="product-label">
											<span class="sale">-30%</span>
										</div>
									</div>
									<div class="product-body">
										<p class="product-category"><?= $models->category->name_category ?></p>
										<h3 class="product-name" value="<?= $models->name_product ?>"><a href="#"><?=  $models->name_product ?></a></h3>
										<h4 class="product-price" value="<?= $models->price ?>"><?= $models->price ?><del class="product-old-price"><?= $models->price*0.3 + $models->price?></del></h4>
										
										<div class="product-btns">
											<?= Html::a('Подробнее', ['buy', 'id' => $models->id_product]) ?>
										</div>
									</div>
									<div class="add-to-cart">
										<?php
											if (!Yii::$app->user->isGuest) {
												echo '<button class="add-to-cart-btn" data="0" value="'. $models->id_product .'"><i class="fa fa-shopping-cart"></i>Добавить в корзину</button>';
											}
											else {
												echo '<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Добавить в корзину</button>';
											}
						?>						
									</div>
								</div>
								
							
							</div>
							<?php if($i == 3) {
							echo '<div class="clearfix visible-lg visible-md"></div>';
								}
							 } 
							 ?>





						

				
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">

		</div>
		<!-- /NEWSLETTER -->


		

	</body>
</html>
