<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\Url;

$this->title = 'Registrarse es muy facil!';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
Modal::begin([
    'header'=>'<h4>Crear Nueva Direccion</h4>',
    'id'=>'modal',
    'size'=>'modal-lg',
    ]);

echo "<div id='modalContent'></div>";
Modal::end();

?>

<script>
    function myFunction() {
        var checkBox = document.getElementById("accept");
        var resgister = document.getElementById("reg_bt"); 
        resgister.disabled=!checkBox.checked;
    }
</script>

<div class="site-signup">
    <h4><?= Html::encode($this->title) ?></h4>


    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'username')->textInput(['placeholder' => "Usuario"])->label(false) ?>

            <?= $form->field($model, 'email')->textInput(['placeholder' => "Email"])->label(false) ?>

            <?= $form->field($model, 'password')->passwordInput(['placeholder' => "Contraseña"])->label(false) ?>

            

            <div class="row">
                <div class="checkbox col-lg-8">
                    <label>
                    
                        <input onclick="myFunction()" id ="accept" type="checkbox" value="">Acepto 


                        <?= Html::a(' Terminos y condiciones', ['site/legal'], ['value'=>Url::to('index.php?r=site/legal'),'id'=>'modalButton','class'=>'yeti']) ?>

                        </input>

                    </label>
                </div>



                <div class="form-group text-right col-lg-3">
                    <?= Html::submitButton('Registrarme', ['class' => 'btn btn-primary', 'name' => 'signup-button','index', "id" => "reg_bt" , "disabled"=>true]) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
