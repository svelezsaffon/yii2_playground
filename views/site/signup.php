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

if(isset($type)==false){
    $type=1;
}


?>
<style type="text/css">
.section-bg-grey{
      background: #F8F8FF;
} 

.rounded {
border-radius: 30px;
}


</style>

<script>

    function myFunction() {
        var checkBox = document.getElementById("accept");
        var resgister = document.getElementById("reg_bt"); 
        resgister.disabled=!checkBox.checked;
    }

    function startloading(){
        SimpleLoading.start('default'); 
    }
</script>

<div class="row section-bg-grey ">   
    <div class="row">
        <div class="col-lg-12">
            <div class="media">
                <div class="media-body">
                    <img src="img/iconos/equipo-247-manizales.png" class="img-responsive center-block">
                </div>
            </div>            
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2 class="section-heading" style="color:grey;">¡Empecemos!</h2>
            <h3 class="section-heading grey-text" style="color:grey;">Cuentanos un poco sobre ti </h3>
        </div>
    </div>     
</div>

<div class="site-signup top-buffer">
<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'username')->textInput(['placeholder' => "Usuario"])->label("Usuario") ?>
        </div>

        <div class="col-lg-4">
            <?= $form->field($model, 'email')->textInput(['placeholder' => "Email"])->label("Email") ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'password')->passwordInput(['placeholder' => "Contraseña"])->label("Contraseña") ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?php echo $form->field($model, 'type')->radioList(array(1=>'Busco servicios',0=>'Presto Servicios'))->label("¿Que deseas hacer en la pagina?");
            ?>
        </div>        
    </div>
            

            <div class="row">

                <div class="checkbox col-md-7">
                    <label>                    
                        <input onclick="myFunction()" id ="accept" type="checkbox" value="">Acepto
                        <?= Html::a(' Términos y condiciones', ['site/legal'], ['value'=>Url::to('index.php?r=site/legal'),'id'=>'modalButton','class'=>'yeti']) ?>
                        </input>
                    </label>
                </div>

                <div class="form-group text-right col-md-3">
                    <?= Html::submitButton('Registrarme', ['class' => 'btn btn-primary', 'onclick'=>'startloading()', 'name' => 'signup-button','index', "id" => "reg_bt" , "disabled"=>true]) ?>
                </div>
            </div>


            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
