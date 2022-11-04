<?php
use common\modules\products\models\Complect;

?> 

 <?= $form->field($model, 'complect_ids')->checkboxList(Complect::getList()) ?>