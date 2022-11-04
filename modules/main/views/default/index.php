<?php

/* @var $this yii\web\View */
/* @var $page dench\page\models\Page */
/* @var $categories dench\products\models\Category[] */

use common\modules\image\helpers\ImageHelper;
use yii\helpers\Url;
use siripravi\slideradmin\widgets\HomeSlider;
use app\modules\main\widgets\OrderScheme;
use app\modules\main\widgets\HomeProductCard;
use app\modules\main\widgets\HomeQuoteCard;
use app\modules\main\widgets\HomeFaqCard;
?>

<?php

echo HomeSlider::widget([
    'id' => 'home-slider',
	'options' => [       
        'data-interval' => 3000,
    ],
    'controls' => [
       '<span><i class="uil uil-angle-left-b"></i></span>',
        '<span><i class="uil uil-angle-right-b"></i></span>',
    ],
]);
 
 ?>    
<section>
<h1 class="mb-4 text-center"><?= $page->name ?>Products By Categories</h1>
<div class="row">
<?= \dominus77\owlcarousel2\Carousel::widget([
    'items' => $this->render('_nav',['categories'=>$categories]), // example
    //'theme' => \dominus77\owlcarousel2\Carousel::THEME_GREEN, // THEME_DEFAULT, THEME_GREEN
    //'tag' => 'div', // container tag name, default div
    'containerOptions' => ['class' => 'categories__slider'], // container html options
    'clientOptions' => [
        'loop' => false,
        'margin' => 10,
        'nav' => true,
        'responsive' => [
            0 => [
                'items' => 1,
            ],
            600 => [
                'items' => 3,
            ],
            1000 => [
                'items' => 5,
            ],
        ],
    ],
]); ?>
</div>
</section>
<p>
Lorem ipsum dolor sit amet. Et magnam quisquam eum provident nesciunt eos maxime itaque nam ratione quia eum officiis facilis ad voluptas repudiandae. Qui laboriosam error quo repudiandae voluptates eum rerum consectetur est dicta nulla ut quisquam fuga. At soluta alias 33 optio laborum et molestias aspernatur eum voluptas nemo ut soluta alias. Est provident sint est consequatur obcaecati ex vitae error aut impedit voluptates eos sint commodi. Vel rerum placeat qui impedit nobis et laudantium veritatis id rerum maiores! Vel molestiae natus id aspernatur molestiae quo dignissimos amet At quos temporibus est voluptas magnam et dignissimos quaerat. A sequi earum ut ducimus vero rem provident minus est vero autem. Ad neque explicabo et commodi vero in amet aperiam qui voluptatem pariatur. Aut dolores aliquid est molestias assumenda non voluptas similique. Sit voluptas dolore aut ducimus commodi eos incidunt rerum. Ut sequi molestiae aut distinctio dolorem qui placeat blanditiis. Vel adipisci dolores et eligendi ipsum est explicabo sapiente nam debitis possimus et blanditiis ipsam. Aut reiciendis praesentium ut culpa nihil sit aperiam repellat vel iste voluptates in nemo ipsam! Id galisum quis est maiores amet ad provident voluptatibus et consequatur ipsa sed aliquam tempore non ratione rerum.

Et quasi ratione qui numquam possimus eum aliquam minus et dolore itaque. Et distinctio exercitationem eum tenetur enim et voluptate neque est enim asperiores quo asperiores asperiores aut alias accusantium. Quo itaque adipisci quo magnam harum aut velit praesentium sed officia ipsa a Quis deleniti et sint sint. Aut nemo accusamus ut voluptatem recusandae ut officiis sunt sit possimus sunt et natus quam. Sit nostrum assumenda aut molestiae unde nam commodi cupiditate qui expedita deserunt ab earum eligendi. Aut laboriosam quia et architecto nesciunt rem odit nostrum ea illum dicta in dolorem saepe. Ut magni esse qui voluptates voluptas aut maiores voluptatem sit doloremque ipsam et maiores dolores aut Quis voluptas. Aut quae impedit id quia facere non doloribus provident.
</p>
<?= HomeProductCard::widget(); ?>  
    <!--?= OrderScheme::widget(['baseUrl' => $asset->baseUrl]) ?--> 
    <?= HomeFaqCard::widget();  ?>
    <?= HomeQuoteCard::widget(); ?>

    <div class="col-12 px-0">

</div>