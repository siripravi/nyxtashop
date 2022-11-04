<?php
use app\assets\FontAwesomeAsset;
use app\assets\SiteAsset;
use common\modules\modal\Modal;

use yii\helpers\Html;
use yii\helpers\Url;

use kartik\icons\Icon;

$asset = SiteAsset::register($this);
//FontAwesomeAsset::register($this);

$this->registerLinkTag(['rel' => 'canonical', 'href' => Url::to((Yii::$app->language === 'en' ? '/en' : null) . explode('?', Yii::$app->request->url)[0], true)]);

$this->registerLinkTag(['rel' => 'alternate', 'hreflang' => 'en-US', 'href' => Url::current(['lang' => 'en'], 'https')]);
$this->registerLinkTag(['rel' => 'alternate', 'hreflang' => 'hi-IN', 'href' => Url::current(['lang' => 'hi'], 'https')]);
// FontAwesome icons
Icon::map($this, Icon::FA);
// Page models
//$pages = Page::findAll(['menu' => true]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> - <?= Yii::$app->name ?></title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Righteous"/>
    <style>
      body {
        font-family: 'Righteous', serif;
        font-size: 48px;
      }
    </style>
    <?php $this->head() ?>
	<style>
	.pagination li a:hover {
    background-color: var(--blue);
     }
	 .pagination li.active a{
		 background-color:var(--blue);
	 }
.pagination li a, .pagination li span {
    margin: 0 5px;
    /* padding: 10px 20px; */
	display:inline-block;
    width: 50px;
    height: 50px;
    line-height: 50px;
    border-radius: 50%;
    font-weight: 600;
    text-align: center;
    color: #ffffff;
    background-color: var(--blue-mad);
    transition: background-color .3s ease;
}
.work-background {
    background-color: #c6715a;
    height: 170px;
    max-height: 100%;
}
.work-container {
    height: 170px;
    max-height: 100%;
}
.work-container h4 {
    font-size: 28px;
    /*font-family: "YanoneKaffeesatz-Regular";*/
    padding-bottom: 10px;
    color: #ffffff;
    font-weight: 400 !important;
    margin: 0;
}
.work-container p {
    color: white;
    margin: 0;
}
.work-container p a {
    color: white;
}
.main_content{
    padding-top:146px;

}
</style>
</head>
<body>
<?php $this->beginBody() ?>

<?php echo $this->render('_headerNav'); ?>    
<div class="container-fluid super_container">
    <div class="row min-vh-100 super_container_inner">
        <div class="super_overlay"></div>
        <div class="col-12">
        <!-- Main Content -->
        <main class="row main_content">
           <?= $content; ?>
            <!-- Featured Products -->
            <div class="col-12">
                <div class="row">
                    <div class="col-12 py-3">
                        <div class="row">
                            <div class="col-12 text-center text-uppercase">
                                <h2>Featured Products</h2>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Product -->
                            <div class="col-lg-3 col-sm-6 my-3">
                                <div class="col-12 bg-white text-center h-100 product-item">
                                    <div class="row h-100">
                                        <div class="col-12 p-0 mb-3">
                                            <a href="product.html">
                                                <img src="images/image-1.jpg" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <a href="product.html" class="product-name">Sony Alpha DSLR Camera</a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <span class="product-price-old">
                                                $500
                                            </span>
                                            <br>
                                            <span class="product-price">
                                                $500
                                            </span>
                                        </div>
                                        <div class="col-12 mb-3 align-self-end">
                                            <button class="btn btn-outline-dark" type="button"><i class="fas fa-cart-plus me-2"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product -->

                            <!-- Product -->
                            <div class="col-lg-3 col-sm-6 my-3">
                                <div class="col-12 bg-white text-center h-100 product-item">
                                    <div class="row h-100">
                                        <div class="col-12 p-0 mb-3">
                                            <a href="product.html">
                                                <img src="images/image-2.jpg" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <a href="product.html" class="product-name">Optoma 4K HDR Projector</a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <span class="product-price">
                                                $1,500
                                            </span>
                                        </div>
                                        <div class="col-12 mb-3 align-self-end">
                                            <button class="btn btn-outline-dark" type="button"><i class="fas fa-cart-plus me-2"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product -->

                            <!-- Product -->
                            <div class="col-lg-3 col-sm-6 my-3">
                                <div class="col-12 bg-white text-center h-100 product-item">
                                    <div class="row h-100">
                                        <div class="col-12 p-0 mb-3">
                                            <a href="product.html">
                                                <img src="images/image-3.jpg" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <a href="product.html" class="product-name">HP Envy Specter 360</a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <div class="product-price-old">
                                                $2,800
                                            </div>
                                            <span class="product-price">
                                                $2,500
                                            </span>
                                        </div>
                                        <div class="col-12 mb-3 align-self-end">
                                            <button class="btn btn-outline-dark" type="button"><i class="fas fa-cart-plus me-2"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product -->

                            <!-- Product -->
                            <div class="col-lg-3 col-sm-6 my-3">
                                <div class="col-12 bg-white text-center h-100 product-item">
                                    <div class="row h-100">
                                        <div class="col-12 p-0 mb-3">
                                            <a href="product.html">
                                                <img src="images/image-4.jpg" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <a href="product.html" class="product-name">Dell Alienware Area 51</a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <span class="product-price">
                                                $4,500
                                            </span>
                                        </div>
                                        <div class="col-12 mb-3 align-self-end">
                                            <button class="btn btn-outline-dark" type="button"><i class="fas fa-cart-plus me-2"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- Featured Products -->

            <div class="col-12">
                <hr>
            </div>

            <!-- Latest Product -->
            
            <!-- Latest Products -->

            <div class="col-12">
                <hr>
            </div>

            <!-- Top Selling Products -->
            
            <!-- Top Selling Products -->

            <div class="col-12 py-3 bg-light d-sm-block d-none">
                <div class="row">
                    <div class="col-lg-3 col ms-auto large-holder">
                        <div class="row">
                            <div class="col-auto ms-auto large-icon">
                                <i class="fas fa-money-bill"></i>
                            </div>
                            <div class="col-auto me-auto large-text">
                                Best Price
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col large-holder">
                        <div class="row">
                            <div class="col-auto ms-auto large-icon">
                                <i class="fas fa-truck-moving"></i>
                            </div>
                            <div class="col-auto me-auto large-text">
                                Fast Delivery
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col me-auto large-holder">
                        <div class="row">
                            <div class="col-auto ms-auto large-icon">
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="col-auto me-auto large-text">
                                Genuine Products
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Main Content -->
    </div>
     <!-- Footer -->
     <?php echo $this->render('_footer'); ?>    
    </div>
</div>
<!-- Messages -->
<div class="toast-container position-fixed bottom-0 start-0 p-3">
    <div class="toast align-items-center text-white bg-success border-0">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fas fa-check-circle me-2"></i>
                This is a success alert message.
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    <div class="toast align-items-center text-white bg-danger border-0">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fas fa-times-circle me-2"></i>
                This is an error alert message.
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    <div class="toast align-items-center text-white bg-warning border-0">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fas fa-exclamation-circle me-2"></i>
                This is a warning alert message.
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    <div class="toast align-items-center text-white bg-info border-0">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fas fa-info-circle me-2"></i>
                This is a error alert message.
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<!-- Messages -->  
    <?= Modal::widget([
        'titleTag' => 'h3',
        'center' => true,
        'size' => 'modal-lg',
    ]); ?>
    <div class="modal fade" id="nav-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-nav-content">
            <div class="modal-nav-body">
            
            </div>
            </div>
        </div>
    </div>
    <?php $this->endBody() ?>	 
</body>
</html>
<?php $this->endPage() ?>