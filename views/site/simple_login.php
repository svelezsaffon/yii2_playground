<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '¿Tienes una cuenta? Has login!';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <h4><?= Html::encode($this->title) ?></h4>

    <?php $form = ActiveForm::begin(['id' => 'login-form',]); ?>

        <div class="row">

            <div class="col-lg-6">
                <?= $form->field($model, 'username')->textInput(['placeholder' => "Usuario"])->label(false) ?>        
            </div>

            <div class="col-lg-6">
                <?= $form->field($model, 'password')->passwordInput(['placeholder' => "Contraseña"])->label(false) ?>        
            </div>
            
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group text-right">
                    
                        <?= Html::submitButton('Entrar', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    
                </div>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
</div>
