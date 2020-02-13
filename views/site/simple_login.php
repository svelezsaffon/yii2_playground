<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '¿Tienes una cuenta? Haz login!';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <h4><?= Html::encode($this->title) ?></h4>

    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <div class="row">

            <div class="col-lg-6">
                <?= $form->field($model, 'username')->textInput(['placeholder' => "Usuario"])->label("Usuario") ?>        
            </div>

            <div class="col-lg-6">
                <?= $form->field($model, 'password')->passwordInput(['placeholder' => "Contraseña"])->label("Contraseña") ?>        
            </div>
            
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group text-center">                    
                        <?= Html::submitButton('Entrar', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>                    
                </div>
            </div>
        </div> 

    <?php ActiveForm::end(); ?>
    <div class="row">
        <div class="col-lg-12 text-center">
            Si olvidó su contraseña, <?= Html::a('cámbiela aqui', ['site/request-password-reset'], ['class' => 'yeti']) ?>.
        </div>
    </div>
</div>
