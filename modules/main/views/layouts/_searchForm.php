<?php
  use yii\helpers\Url;
  use kartik\typeahead\Typeahead;
  use yii\web\JsExpression;
  use yii\bootstrap5\ActiveForm;
?>
 <?php $form = ActiveForm::begin([
        'id' => 'search-form',
        'action' => Url::to(['/search']),
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
          //  'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
          //  'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>
    <?php
            $template = '<a href="{{link}}">{{value}}</a>';
            echo Typeahead::widget([
                //'id' => 'search',
                'name' => 'query',
                'value' => Yii::$app->request->get('query'),
                'container' => [
                       // 'class'=>'search_input',
                ],
                'options' => [
                    'placeholder' => Yii::t('app', 'Enter the name of the product'),
                    'style' => 'border-bottom-right-radius: 0; border-top-right-radius: 0; font-size: 1rem;',
                ],
                'pluginOptions' => [
                    'highlight' => true,
                ],
                'dataset' => [
                    [
                        'datumTokenizer' => "Bloodhound.tokenizers.obj.whitespace('value')",
                        'display' => 'value',
                        'templates' => [
                                'notFound' => '<div class="text-danger" style="padding:0 8px">' . Yii::t('app', 'No results were found for this request.') . '</div>',
                                'suggestion' => new JsExpression("Handlebars.compile('{$template}')"),
                        ],
                        'remote' => [
                            'url' => Url::to(['/main/search/list']) . '?q=%QUERY',
                            'wildcard' => '%QUERY',
                            'cache' => false,
                        ],
                        'limit' => 10
                    ]
                ]
            ]);
    ?>                  
	<button type="submit" class="header_search_button">
            <iconify-icon icon="cil:search" style="color: #0c3339;" width="20" ></iconify-icon>
    </button> 
    <?php ActiveForm::end(); ?>