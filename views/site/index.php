<?php
use yii\widgets\Linkpager;
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Product;
use app\models\Category;
/* @var $this yii\web\View */

$this->title = 'Сайт электроники';
?>
<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
					<?php  foreach($all_category_not_limit as $models) { ?>
					  
						<li class="active"><?= Html::a($models->name_category, ['store', 'id' => $models->id_cat]) ?></li>
					
					
					<?php  } ?>
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
					<!-- shop -->
					<?php foreach($all_category as $models) { ?>
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="<?= $models->image ?>" alt="">
							</div>
							<div class="shop-body">
								<h3><?= $models->name_category ?></h3>
								<a href="site/store?id=<?= $models->id_cat  ?>" class="cta-btn">Посмотреть<i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<?php } ?>
					<!-- /shop -->

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Новые продукты</h3>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
										<?php  foreach($model as $models) { ?>
										<div class="product">
											<div class="product-img">
											
											<img class="img_prod" src="<?= $models->picture	?>" alt="">
												<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
									
												<p class="product-category"><?= $models->category->name_category	?></p>
												<h3 class="product-name" value="<?= $models->name_product ?>"><a href="#"><?= $models->name_product	?></a></h3>
												<h4 class="product-price" value="<?= $models->price	?>"><?= $models->price	?> <del class="product-old-price"><?= $models->price*0.3 + $models->price ?></del></h4>
											
												<div class="product-btns">
													 <?= Html::a('Подробнее', ['buy', 'id' => $models->id_product]) ?>
												</div>
											</div>
											<div class="add-to-cart">
											<?php
											if (!Yii::$app->user->isGuest) {
										echo '<button class="add-to-cart-btn" data="1" value="'. $models->id_product .'"><i class="fa fa-shopping-cart"></i>Добавить в корзину</button>';
        }
		else {
			echo '<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Добавить в корзину</button>';
		}
						?>						
											</div>
										</div>
										<?php } ?>
										<!-- /product -->
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>2</h3>
										<span>Дня</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Часов</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Минуты</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Секунд</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">Горячие новинки недели</h2>
							<p>Новая коллекция, скидка 50%</p>
							<a class="primary-btn cta-btn" href="site/store?id=3">За покупками!</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Популярные товары</h3>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<!-- product -->
										<?php foreach($result as $results) { ?>
										<div class="product">
											<div class="product-img">
												<img src="<?= $results['picture'] ?>" alt="">
												<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category"><?= $results['name_category'] ?></p>
												<h3 class="product-name"><a href="#"><?= $results['name_product'] ?></a></h3>
												<h4 class="product-price"><?= $results['price'] ?><del class="product-old-price"><?= $results['price'] * 0.3 + $results['price']?> </del></h4>
												
												<div class="product-btns">
													 <?= Html::a('Подробнее', ['buy', 'id' => $results['id_product']]) ?>
												</div>
											</div>
											<div class="add-to-cart">
																<?php
											if (!Yii::$app->user->isGuest) {
										echo '<button class="add-to-cart-btn" data="1" value="'. $models->id_product .'"><i class="fa fa-shopping-cart"></i>Добавить в корзину</button>';
        }
		else {
			echo '<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Добавить в корзину</button>';
		}
						?>	
											</div>
										</div>
										<?php } ?>
										<!-- /product -->
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
	
		</div>
		<!-- /NEWSLETTER -->