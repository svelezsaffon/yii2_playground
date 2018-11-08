<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    


    <!-- Theme CSS -->
    <link href="css/agency.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, user-scalable=no">


    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

<style type="text/css">
.navbar {
    margin-bottom: 0;
}

.top-buffer { margin-top:20px; }
.top-buffer-null { margin-top:0px; }
.yeti{color: #1e90ff;}
.left-buffer {
    margin-left: 1px;
}

</style>

</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Servicio 24/7',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $items=[];
    
    if(Yii::$app->user->isGuest ){
        $items=[
            ['label' => 'Ingresar','icon'=> 'road', 'url' => ['site/login']],
            ['label' => 'Registrarse','icon'=> 'road', 'url' => ['site/signup']],
            
        ];
    }else if(Yii::$app->user->can('admin')){
            
            $items=[
            ['label' => 'Servicios','icon'=> 'road', 'url' => ['/servicios']],
            ['label' => 'Trabajadores','icon'=> 'road', 'url' => ['/trabajador']],            
            ['label' => 'Direcciones','icon'=> 'road', 'url' => ['/direccion']],
            ['label' => 'Servicios x dia', 'url' => ['/servicioxdia']],
            ['label' => 'Planes', 'url' => ['/plane']],

            (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Salir (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ];
    }else{


        $items=[
            ['label' => 'Mis direcciones','icon'=> 'road', 'url' => ['/direccion']],
            ['label' => 'Mis servicios por dia', 'url' => ['/servicioxdia']],
            ['label' => 'Mis planes', 'url' => ['/plane']],

            (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Salir (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ];
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],        

        'items' => $items,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

</div>



<footer class="footer">
    <div class="container">

    </div>
</footer>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>