<?php
use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>


<body>
    <?php $this->beginBody() ?>


<div style="border:1px solid black;display: block; margin-left: auto; margin-right: auto;width: 100%;">
<img style="max-width:40%; max-height:40%; display: block; margin-left: auto; margin-right: auto;width: 100%;" class="center" src="http://servicio247.co/web/img/logos/logoservicios.jpg" alt="Italian Trulli">            

<div style=" display: block; margin-left: auto; margin-right: auto;width: 50%;">
    <h2>Hola! <small> Gracias por unirte a nuestro equipo</small></h2>
<div>
    
</div>

<div style="margin-left: auto; margin-right: auto;">
    <p>
        Aquí te ayudamos para que todas tus tareas cotidianas sean mucho más fáciles. Tu te encargas de lo que realmente es importante para ti, y nosotros nos encargamos de lo que te quita tiempo. 
    </p>

    <p>
        Para completar de verificar tu cuenta, sigue este enlace
    </p>    
</div>

<?php 

echo '<a style="background-color: #999; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; display: block; margin-left: auto; margin-right: auto; width: 50%;" href="'.$content.'" class="button button2">Verificar!</a>';

?>

<br>
<br>
<br>
    
</div>

</div>
    

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
