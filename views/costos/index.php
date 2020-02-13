<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CostosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Servicios que prestas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="costos-index">

        <div class="row">
            <div class="jumbotron">
                <h2 class="section-heading"><?= Html::encode($this->title) ?></h2>
                <p>En esta seccion encontraras el listado de los horarios y servicios que prestas</p>
                <p><?= Html::a('Crear horario y servicio', ['costos/create'], ['class' => 'btn btn-primary','style'=>'width:40%;']) ?></p>
            </div>

        </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [  
                'label'=>'Servicio',
                'format' => 'raw',
                'value'=>function ($data) {
                    return Html::a($data['servicios_nombre'],['servicios/view', 'id' => $data['servicio']]);                    
                },
            ], 
            [  
                'label'=>'Ciudad',
                'format' => 'raw',
                'value'=>function ($data) {
                    return Html::a($data['ciudad_nombre'],['ciudades/view', 'id' => $data['ciudad']]);                    
                },
            ], 
            [  
                'label'=>'Horario',
                'format' => 'raw',
                'value'=>function ($data) {
                    return Html::a($data['horario_desc'],['horarios/view', 'id' => $data['horario']]);                    
                },
            ],
            [  
                'label'=>'Valor',
                'format' => 'raw',
                'value'=>function ($data) {                    
                    return Yii::$app->formatter->asCurrency($data['valor'], 'COP');
                },
            ],                              

                   [
          'class' => 'yii\grid\ActionColumn',
          'header' => 'Actions',
          'headerOptions' => ['style' => 'color:#337ab7'],
          'template' => '{view}{update}{delete}',
          'buttons' => [
            'view' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'lead-view'),
                ]);
            },

            'update' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'lead-update'),
                ]);
            },
            'delete' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('app', 'lead-delete'),
                ]);
            }

          ],
          'urlCreator' => function ($action, $model, $key, $index) {
            if ($action === 'view') {
                $url ='index.php?r=costos%2Fview&id='.$model['id'];
                return $url;
            }

            if ($action === 'update') {
                $url ='index.php?r=costos%2Fview&id='.$model['id'];
                return $url;
            }
            if ($action === 'delete') {
                $url ='index.php?r=costos%2Fview&id='.$model['id'];
                return $url;
            }

          }
          ],
        ],
    ]); ?>
</div>
