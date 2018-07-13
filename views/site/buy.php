<?php 
use yii\helpers\Html;

?>

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
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="../<?= $model->picture ?>" alt="Image">
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name"><?=  $model->name_product ?></h2>
							<div>
								<h3 class="product-price" value="<?= $model->price ?>"><?= $model->price ?><del class="product-old-price"><?= $model->price+650 ?></del></h3>
								<span class="product-available"></span>
							</div>
							<p><?= $model->full_text ?></p>
							<div class="add-to-cart">
							
								<?php
											if (!Yii::$app->user->isGuest) {
										echo '<button class="add-to-cart-btn add-to-cart-btn-deux" data="2" value="'. $model->id_product .'"><i class="fa fa-shopping-cart"></i>Добавить в корзину</button>';
        }
		else {
			echo '<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Добавить в корзину</button>';
		}
						?>		
							</div>
							<ul class="product-links">
								<li>Категория:</li>
								<li><a href="#"><?= $model->category->name_category ?></a></li>
								
							</ul>

						

						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Полное  описание</a></li>
								<li><a data-toggle="tab" href="#tab2">Детали</a></li>
								
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p><?= $model->full_text ?></p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div class="col-md-12">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
										</div>
									</div>
								</div>
								<!-- /tab2  -->

								<!-- tab3  -->
								<div id="tab3" class="tab-pane fade in">
						
								</div>
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Похожие товары</h3>
						</div>
					</div>

					<!-- product -->
					<?php  foreach($rel_limit as $related) { ?>
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="../<?=  $related->picture ?>" alt="">
								<div class="product-label">
									<span class="sale">-30%</span>
								</div>
							</div>
							<div class="product-body">
								<p class="product-category"><?= $related->category->name_category?></p>
								<h3 class="product-name" value="<?= $related->name_product ?>"><a href="#"><?=  $related->name_product ?></a></h3>
								<h4 class="product-price" value="<?= $related->price ?>"><?=  $related->price ?> <del class="product-old-price"><?=  $related->price ?></del></h4>
								<div class="product-btns">
									 <?= Html::a('Подробнее', ['buy', 'id' => $related->id_product]) ?>
								</div>
							</div>
							<div class="add-to-cart">
									<?php
											if (!Yii::$app->user->isGuest) {
										echo '<button class="add-to-cart-btn add-to-cart-btn-deux" data="0" value="'. $related->id_product .'"><i class="fa fa-shopping-cart"></i>Добавить в корзину</button>';
        }
		else {
			echo '<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Добавить в корзину</button>';
		}
						?>	
							</div>
						</div>
					</div>
					
					<?php  } ?>
					<!-- /product -->

				

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->

