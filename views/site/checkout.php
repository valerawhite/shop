<?php 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
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

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Ваш адрес</h3>
							</div>
							 <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>
	<?= $form->field($model, 'first_name')->textInput(['autofocus' => true]) ?>
	<?= $form->field($model, 'last_name')->textInput() ?>
	<?= $form->field($model, 'oblast')->textInput() ?>
	<?= $form->field($model, 'district')->textInput() ?>
	<?= $form->field($model, 'street')->textInput() ?>
	<?= $form->field($model, 'house')->textInput() ?>
	<?= $form->field($model, 'flat')->textInput() ?>
	<?= $form->field($model, 'phone')->textInput() ?>
	 <?php ActiveForm::end(); ?>
						
						
						
						</div>
						<!-- /Billing Details -->

			

					
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Ваш заказ</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>Продукт</strong></div>
								<div><strong>Цена</strong></div>
							</div>
							<div class="order-products">
							<?php  $priceall = 0; foreach($this->params['brun'] as $model) { 
									$i = 0; ?>
								<div class="order-col">
									<div class="id_product" value="<?= $model->productbrun[$i]->id_product; ?>"><?= $model->productbrun[$i]->id_product; ?></div>
									<div><?= $model->productbrun[$i]->name_product; ?></div>
									<div><?= $model->productbrun[$i]->price; ?> руб</div>
								</div>
							<?php $priceall += $model->productbrun[$i]->price; $i++; } ?>
							</div>
							
							<div class="order-col">
								<div><strong>Всего</strong></div>
								<div><strong class="order-total"><?= $priceall ?> руб</strong></div>
							</div>
						</div>
				
						<div class="input-checkbox">
							<input type="checkbox" id="terms">
							<label for="terms">
								<span></span>
								Я согласен с условиями <a href="#">политики и конфиденциальности</a>
							</label>
						</div>
						<a href="#" class="primary-btn order-submit" value="0">Сделать заказ</a>
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

	</body>
</html>
