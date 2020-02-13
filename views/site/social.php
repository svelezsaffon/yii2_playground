<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Puedes registrate/login con redes sociales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

<div class="row">
    <div class="col-md-12">
        <h4><?= Html::encode($this->title) ?></h4>
    </div>
</div>
<div class="row">
    
    <div class="col-md-12">
        <?= yii\authclient\widgets\AuthChoice::widget([
            'baseAuthUrl' => ['site/auth']
        ]) ?>
    </div>

</div>

</div>
