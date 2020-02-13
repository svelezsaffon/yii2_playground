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
    <h2>Nuevo usuario se ha registrado en la pagina!</h2>
<div>
    
</div>

<div style="margin-left: auto; margin-right: auto;">
    <p>
        Nuevo usuario registrado en la plataforma!
    </p>

    <p>
        Nombre: <?php echo $nombre; ?>
    </p>    
    <p>
        ID: <?php echo $id; ?>
    </p>    
</div>


<br>
<br>
<br>
    
</div>

</div>
    

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
