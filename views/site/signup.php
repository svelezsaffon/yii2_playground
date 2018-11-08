<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Registrarse es muy facil!';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h4><?= Html::encode($this->title) ?></h4>


    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['placeholder' => "Usuario"])->label(false) ?>

                <?= $form->field($model, 'email')->textInput(['placeholder' => "Email"])->label(false) ?>

                <?= $form->field($model, 'password')->passwordInput(['placeholder' => "Contraseña"])->label(false) ?>

                <div class="form-group text-right">
                    <?= Html::submitButton('Registrarme', ['class' => 'btn btn-primary', 'name' => 'signup-button','index']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
