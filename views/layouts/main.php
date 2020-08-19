<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use edwinhaq\simpleloading\SimpleLoading;
use app\models\Notificaciones;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <?=SimpleLoading::widget()?>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    


    <!-- Theme CSS -->
    <link href="css/agency.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, user-scalable=no">


    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

<style type="text/css">

.center-justified {
  text-align: justify;
  margin: 0 auto;  
}

.top-buffer { margin-top:20px; }
.top-buffer-60 { margin-top:100px; }
.top-buffer-30 { margin-top:50px; }
.top-buffer-15 { margin-top:30px; }
.top-buffer-10 { margin-top:10px; }
.top-buffer-null { margin-top:0px; }
.yeti{color: #1e90ff;}
.red-yeti{color: #FF3333;}
.left-buffer {
    margin-left: 1px;
}

.navbar {
    background-color: #FFFFFF;
    border-color: #808080;
}
.navbar-toggle{
    background-color: #1e90ff;
    border-color: #808080;
}

.grey-text{
    color: #A9A9A9; 
    text-transform: none;
}

.yeti-text{
    color: #1e90ff; 
    text-transform: none;
}

section {
  width: 100%;
  padding: 0 0%;
  display: table;
  margin: 0;
  max-width: none;  
  height: 100vh;
}
  
</style>


</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        //'brandLabel' => '<img src="img/logos/logoservicios.jpg" style="max-width:10%;" class="img-responsive"/>', 
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
             'class' => 'navbar-inverse navbar-fixed-top',
        ],

    ]);
    $items=[];
    
    if(Yii::$app->user->isGuest ){
        $items=[
            ['label' => 'Trabaja con nosotros','icon'=> 'road', 'url' => Url::to('index.php?r=aplicacion-trabajos/create'),'linkOptions' => ['style' => 'color: #1e90ff']],
            ['label' => 'Ingresar','icon'=> 'road', 'url' =>  Url::to('index.php?r=site/login'),'linkOptions' => ['style' => 'color: #1e90ff']],
            ['label' => 'Registrarse','icon'=> 'road', 'url' => Url::to('index.php?r=site/signup'),'linkOptions' => ['style' => 'color: #1e90ff']]
            
        ];
    }else if(Yii::$app->user->can('admin')){
            
            $items=[

            ['label' => 'Sitios',
                        'items' => [
                                        ['label' => 'Ciudades', 'url' => ['/ciudades']],
                                        ['label' => 'Direcciones','icon'=> 'road', 'url' => ['/direccion']],
                        ],
            ],
            ['label' => 'Servicios',
                        'items' => [
                                        ['label' => 'Servicios','icon'=> 'road', 'url' => ['/servicios']],
                                        ['label' => 'Servicios x dia', 'url' => ['/servicioxdia']],                                        
                                        ['label' => 'Planes', 'url' => ['/plane']],
                                        ['label' => 'Horarios', 'url' => ['/horarios']],
                                        ['label' => 'Horario X Servicios', 'url' => ['/horarioxservicio']],
                                        ['label' => 'Ranking','icon'=> 'road', 'url' => ['/ranking']],                        
                        ],
            ],
            ['label' => 'Empleados',
                        'items' => [                                        
                                        ['label' => 'Aplicaciones de trabajo', 'url' => ['/aplicacion-trabajos']],
                                        ['label' => 'Servicos x empleado', 'url' => ['/trabajadordesem']],
                                        ['label' => 'Trabajadores','icon'=> 'road', 'url' => ['/trabajador']],                        

                        ],
            ],            
            ['label' => 'Dinero',
                        'items' => [                                        
                                        ['label' => 'Costos', 'url' => ['/costos']],            
                                        ['label' => 'Pagos', 'url' => ['/pago']],
                                        ['label' => 'Convenios', 'url' => ['/convenios-pago']],
                        ],
            ], 
            ['label' => 'Usuarios',
                        'items' => [                                        
                                        ['label' => 'Usuarios', 'url' => ['/user-info']],            
                                        ['label' => 'Facebook', 'url' => ['/facebook-data']],
                                        ['label' => 'Cuentas verificadas', 'url' => ['/cuentaverificada']],
                        ],
            ], 

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
    }else if(Yii::$app->user->can('user')){

    $notis_query=Notificaciones::find()->where(['para' => Yii::$app->user->id, 'leida'=>0])->all();

    $size=0;

    $items_notis=[];

    foreach($notis_query as $noti){
        array_push($items_notis,[
            'label' => $noti['titulo'], 
            'url' =>  Url::to('index.php?r=/notificaciones/view&id='.$noti['id'])]);
        $size++;
    }


        $items=[
 
            ['label' => 'Mis direcciones','icon'=> 'road', 'url' => ['/direccion'],'linkOptions' => ['style' => 'color: #19B9B0']],
            ['label' => 'Mis servicios', 'url' => ['/servicioxdia'],'linkOptions' => ['style' => 'color: #19B9B0']],                         
            ['label' => 'Mis pagos', 'url' => ['/pago'],'linkOptions' => ['style' => 'color: #19B9B0']],
            ['label' => 'Puntuaciones', 'url' => ['/ranking'],'linkOptions' => ['style' => 'color: #19B9B0']],
            ['label' => 'Notificaciones '. Html::tag('span', $size, ['class' => 'badge','linkOptions' => ['style' => 'color: #19B9B0']]),
                        'items' => $items_notis,
            ],
            (
                '<li >'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Salir (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout','linkOptions' => ['style' => 'color: #19B9B0']]
                )
                . Html::endForm()
                . '</li>'
            )

        ];
    }else if(Yii::$app->user->can('seller')){

    $notis_query=Notificaciones::find()->where(['para' => Yii::$app->user->id, 'leida'=>0])->all();

    $size=0;

    $items_notis=[];

    foreach($notis_query as $noti){
        array_push($items_notis,[
            'label' => $noti['titulo'], 
            'url' =>  Url::to('index.php?r=/notificaciones/view&id='.$noti['id'])]);
        $size++;
    }

        $items=[            
                                    
            ['label' => 'Servicios Prestados', 'url' => ['/costos'],'linkOptions' => ['style' => 'color: #19B9B0']],
            ['label' => 'Notificaciones '. Html::tag('span', $size, ['class' => 'badge'] ),
                        'items' => $items_notis,
            ],            
            
            (
                '<li >'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Salir (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout','linkOptions' => ['style' => 'color: #19B9B0']]
                )
                . Html::endForm()
                . '</li>'
            )
        ];
    }



    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right' ],        
        
        'items' => $items,
        'encodeLabels' => false,
    ]);
    NavBar::end();
    ?>

    <div class="container top-buffer">
        
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

</div>



<footer class="footer">    
    <div class="container">
        <div class="row">
            <div class="col-md-12"> 
                <div class="row">
                    <div class="col-md-12">
                        <a href="https://wa.me/573008080860" target="_blank">
                            <i class="fab fa-whatsapp-square fa-stack-2x yeti">3008080860</i>
                        </a>                         
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>