<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\components\HelloWidget;
use app\models\Brun;
use yii\widgets\ActiveForm;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
					<div class="menu_top">
					              <?php
  
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Домой', 'url' => ['./index.php']],
		
				
			
            Yii::$app->user->isGuest ? (
			//['label' => 'Регистрация', 'url' => ['/auth/signup']]
            ['label' => 'Вход', 'url' => ['/auth/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/auth/logout'], 'post')
                . Html::submitButton(
                    'Выход (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link blink']
                )
                . Html::endForm()
                . '</li>'
            )
			
        ],
    ]);
   
    ?>
	
	</div>
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
								<?php if($this->params['flag'] == 2) 
									echo '<a href="../"><img src="../uploads/logo.png" alt=""></a>';
								else 
									echo '<a href="./"><img src="uploads/logo.png" alt=""></a>';
									
									?>
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
							
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								
									
								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Ваша корзина</span>
										<div class="qty"><?= $this->params['colvo'] ?></div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
										
									<?php $priceall = 0; foreach($this->params['brun'] as $model) { 
									$i = 0;
									
									
									?>
										<div class="product-widget">
												<div class="product-img">
												
												<?php
												if($this->params['flag'] == 2) {
													echo '<img src="../' .$model->productbrun[$i]->picture . '" alt="">';
												}
												else {
													echo '<img src="' .$model->productbrun[$i]->picture . '" alt="">';
												}
													?>
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#"><?= $model->productbrun[$i]->name_product; ?></a></h3>
													<h4 class="product-price"><?= $model->productbrun[$i]->price; ?> руб</h4>
												
												</div>
												<button class="delete" value="<?= $model->productbrun[$i]->id_product ?>"><i class="fa fa-close"></i></button>
											</div>
											
									<?php $priceall += $model->productbrun[$i]->price; $i++; } ?>
										</div>
										<div class="cart-summary">
											<small id="order" value="<?= $this->params['colvo'] ?>">Заказано <?= $this->params['colvo'] ?> товаров</small>
											<h5 class="subtotal" value="<?= $priceall ?>">Всего: <?= $priceall ?> руб</h5>
										</div>
										<div class="cart-btns">
											<a href="#">*</a>
											<?= Html::a('Купить<i class="fa fa-arrow-circle-right"></i>', ['checkout']) ?>  
										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->


    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>



		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">О нас</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>Калуга, ул. Степана-Разина</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>8-953-312-05-75</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>valeraivankov@yandex.ru</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Категории</h3>
								<ul class="footer-links">
									<li><a href="#">Ноутбуки</a></li>
									<li><a href="#">Фотоаппарты</a></li>
									<li><a href="#">Акустические системы</a></li>
									<li><a href="#">Планшеты</a></li>
									<li><a href="#">Смартфоны</a></li>
									<li><a href="#">Телевизоры</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Информация</h3>
								<ul class="footer-links">
									<li><a href="#">О нас</a></li>
									<li><a href="#">Контактная информация</a></li>
									<li><a href="#">Политика конфиденциальности</a></li>
									<li><a href="#">Заказы и возвраты</a></li>
									<li><a href="#">Другое</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Сервис</h3>
								<ul class="footer-links">
									<li><a href="#">Мой аккаунт</a></li>
									<li><a href="#">Моя корзина</a></li>
									<li><a href="#">Как заказать</a></li>
									<li><a href="#">Как зарегестрироваться</a></li>
									<li><a href="#">Помощь</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> Все права защищены 
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

<?php $this->endBody() ?>
<script>
function subtotlalFunction() {
	alert('start');
	
}
var pricemain = $(".subtotal").attr("value");
var i = $("#order").attr("value");
$(".add-to-cart-btn").on('click', function() {
	var dataset = $(this).attr('data');
	var valueCart = $(this).attr('value');
	var src_img = $(this.parentNode.parentNode.childNodes[1].childNodes[1]).attr('src');
	var price = $(this.parentNode.parentNode.childNodes[3].childNodes[5]).attr('value');
	var product_name = $(this.parentNode.parentNode.childNodes[3].childNodes[3]).attr('value');
	var elem = $(this);
	pricemain = +pricemain + +price;
	if(dataset == 1) {
		var site = "site/cart?id_product=";
	}
	else if(dataset == 0){
		alert(dataset);
		var site = "cart?id_product=";
	}
	$.get(site +valueCart, function(data) {
		if(data == '1') {
			i++;
			$(".qty").html(i);
			$(elem).html('Добавлено в корзину');
			$(".cart-list").append("<div class='product-widget'><div class='product-img'><img src='"+src_img+"' alt='product'></div><div class='product-body'><h3 class='product-name'><a href='#'>"+ product_name +"</a></h3><h4 class='product-price'><span class='qty'></span>"+price+" руб</h4></div></div>");
			var cartSub = $(".cart-summary").children('.subtotal').html('Всего:'+pricemain + " " + "руб");
			var cartSub = $(".cart-summary").children('#order').html("Заказан(о)" +" " + i + " " + "товар(а)");
		}
		else {
			alert('Произошла ошибка');
		}
	});
});
var price_deux = $(".subtotal").attr("value");
var l = $("#order").attr("value");
$(".add-to-cart-btn-deux").on('click', function() {
	var valueCart = $(this).attr('value');
	var src_img = $(this.parentNode.parentNode.parentNode.parentNode.childNodes[3].childNodes[1].childNodes[1].childNodes[0].childNodes[0].childNodes[3]);
	src_img = $(src_img).attr('src');
	var product_name = $(this.parentNode.parentNode.childNodes[1]).html();
	var price = $(this.parentNode.parentNode.childNodes[3].childNodes[1]).attr('value');
	var elem = $(this);
	price_deux = +price_deux + +price;
	$.get("cart?id_product=" +valueCart, function(data) {
		if(data == '1') {
			l++;
			$(".qty").html(l);
			$(elem).html('Добавлено в корзину');
			$(".cart-list").append("<div class='product-widget'><div class='product-img'><img src='"+src_img+"' alt='product'></div><div class='product-body'><h3 class='product-name'><a href='#'>"+ product_name +"</a></h3><h4 class='product-price'><span class='qty'></span>"+price+" руб</h4></div></div>");
			var cartSub = $(".cart-summary").children('.subtotal').html('Всего:'+price_deux + " " + "руб");
			var cartSub = $(".cart-summary").children('#order').html("Заказан(о)" +" " + l + " " + "товар(а)");
		}
		else {
			alert('Произошла ошибка');
		}
	});
});
$(".delete").on('click', function() {
	var elem = $(this);
	var id_product = $(this).attr('value');
	$.get("site/delprod?id_product=" +id_product, function(data) {
		if(data == '1') {
			var parent = $(elem).parents(".product-widget");
			parent.detach();
		}
	});
});
$("#terms").on("click", function() {
	if($(".order-submit").attr('value') == 0) {
		$(".order-submit").attr('value', '1');
	}
	else {
		$(".order-submit").attr('value', '0');
	}
}); 
$(".order-submit").on("click", function() {
	if($(this).attr('value') == 1) {
		var id_product = $(".id_product").attr('value');
	$.get("../site/order?id_product="+id_product, function(data) {
		if(data == '1') {
		var totalprice = $(".order-total").html();
		var totalorder = $("#order").html();
		alert("Спасибо за покупку товаров." + totalorder + " на сумму" + " " +totalprice );
			}
		});
	}
	else {
		alert('Подтвердите согласие на обработку персональных данных');
	}
});

</script>
</body>
</html>
<?php $this->endPage() ?>
