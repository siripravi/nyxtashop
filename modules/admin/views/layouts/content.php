<?php
/* @var $content string */

use yii\bootstrap5\Breadcrumbs;
use app\modules\admin\widgets\Alert;
?>
<div class="content-wrapper" style="background-color: rgb(217 255 244 / 11%);min-height: 189px;" >
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="xcontainer-fluid" >
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <?php
                        if (!is_null($this->title)) {
                            echo \yii\helpers\Html::encode($this->title);
                        } else {
                            echo \yii\helpers\Inflector::camelize($this->context->id);
                        }
                        ?>
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <?php
                    echo Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        'options' => [
                            'class' => 'breadcrumb float-sm-right'
                        ]
                    ]);
                    ?>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <?= Alert::widget() ?>
            <?= $content ?><!-- /.container-fluid -->
        </div>
    </div>
    <!-- /.content -->
</div>