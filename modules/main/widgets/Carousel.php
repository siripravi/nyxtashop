<?php

namespace app\modules\main\widgets;
use Yii;
use yii\bootstrap5\BootstrapPluginAsset;
use yii\bootstrap5\Html;
use yii\bootstrap5\Widget;
use yii\helpers\ArrayHelper;

class Carousel extends \yii\bootstrap5\Carousel
{
    public $thumbnails = [];
	
	/**
     * Renders carousel indicators.
     * @return string the rendering result
     */
    public function renderIndicators(): string
    {
        if ($this->showIndicators === false){
            return '';
        }
        $indicators = [];
        for ($i = 0, $count = count($this->items); $i < $count; $i++){
            $options = [
                'data' => [
                    'target' => '#' . $this->options['id'],
                    'slide-to' => $i
                ],
                'type' => 'button',
				'thumb' => $this->thumbnails[$i]['thumb']
            ];
            if ($i === 0){
                Html::addCssClass($options, ['activate' => 'active']);
                $options['aria']['current'] = 'true';
            }
          //  $indicators[] = Html::tag('button', '', $options);
			
			 $indicators[] = Html::tag('li',Html::img($options['thumb']), $options);
        }
        return Html::tag('ol', implode("\n", $indicators), ['class' => ['carousel-indicators']]);
    }
 }
 