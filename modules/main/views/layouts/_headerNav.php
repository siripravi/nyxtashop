<?php
  use yii\helpers\Html;
  use yii\helpers\Url;

?>
<div class="menu">
    <div class="menu_nav">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/catalog">Catalog</a></li>
            <li><a href="/blog">Blog</a></li>
            <li><a href="/contacts">Contact</a></li>
            <li><a href="/reviews">Reviews</a></li>
        </ul>
    </div>
</div>  
    
<header class="header">
<?= $this->render('_topNav');?>
    <div class="header_content d-flex flex-row align-items-center justify-content-start">
       
        <div class="hamburger">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><iconify-icon icon="codicon:three-bars"></iconify-icon></span>
            </button>
        </div>
        <div class="header_content d-flex flex-row align-items-center justify-content-start">        
            <div class="logo">
                <a href="/">
                    <div class="d-flex flex-row align-items-center justify-content-start">
                        <?= Html::img('/images/nyxta.png',["style"=>"max-height: 80%; padding: 0;position:relative;"]);?>
                    </div>
                </a>
            </div>
            <div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
                <div class="header_search">
                    <?= $this->render('_searchForm');  ?>       		
                </div>
                <div class="user"><a href="#">
                    <iconify-icon icon="codicon:account" style="color: #0c3339;" width="20" rotate="0deg"></iconify-icon></a>
                </div>
                <div class="cart"><a href="/main/cart/index"><iconify-icon icon="ant-design:shopping-cart-outlined" style="color: #0c3339;" width="32" rotate="20deg"></iconify-icon></a></div>
                <div class="header_phone d-flex flex-row align-items-center justify-content-start">
                    <iconify-icon icon="clarity:phone-handset-line" style="color: #0c3339;" width="20" rotate="0deg"></iconify-icon><span>+91 833-185-27000</span>
                </div>
                <div class="header_phone d-flex flex-row align-items-center justify-content-start">
                    <?= Html::a('<iconify-icon icon="emojione:flag-for-united-states" style="font-size: 24px;"></iconify-icon>', Url::current(['lang' => 'en']), ['class' => ['mt-1 btn btn-sm', Yii::$app->language === 'en' ? '' : ''], 'hreflang' => 'us-EN', 'rel' => 'nofollow']) ?>
                    <?= Html::a('<iconify-icon icon="emojione:flag-for-india" style="font-size: 24px;"></iconify-icon>', Url::current(['lang' => 'hi']), ['class' => ['mt-1 btn btn-sm', Yii::$app->language === 'hi' ? '' : ''], 'hreflang' => 'hi-IN', 'rel' => 'nofollow']) ?>
                </div>
            </div>
        </div>       
    </div>
 </header>
 
