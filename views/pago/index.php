<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PagoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pagos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pago-index">

    <?php
    
    if(isset($_GET["dataProvider"]) && isset($_GET["searchModel"])){
        echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'fecha_pago',
            'user',
            'servicioxdia',
            'plan',
            'verificado',
            'plandia',
            'monto',
            'descripcion:ntext',
            'extratransferencia:ntext',
            'metodo',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);

        }else { ?>

        <div class="row">
            <div class="jumbotron">
                <h1 class="section-heading"><?= Html::encode($this->title) ?></h1>
                <p>En esta seccion encontraras el listado de pagoes que debes realizar y de los pagos ya realizados</p>                
            </div>
        </div>

        <table class="table table-hover">
        
            <tr>
                <th>Servicio a pagar</th>
                <th>Tipo de servicio</th>                
                <th>Fecha del servicio</th>
                <th>Pagar</th>
            </tr>
            <?php
            foreach ($pagos as $pago){ 
                echo "<tr>";
                    echo "<td>";
                        echo Html::a('<i class="fas fa-edit"></i> Ver servicio',['/servicioxdia/view', 'id' => $pago['servicioid']], ['class' => 'btn btn-black yeti', 'title' => 'Sign Up']);

                    echo "</td>";

                    echo "<td>";
                            echo $pago['nombre'];                        
                    echo "</td>";                    

                    echo "<td>";
                            echo $pago['fecha'];                        
                    echo "</td>";                    

                    echo "<td>"; 
                        
                        echo Html::a('<i class="fas fa-dollar-sign"></i> Pagar',['/pago/update','id'=>$pago['pagoid']], ['class' => 'btn btn-black yeti', 'title' => 'Pagar']);

                    echo "</td>";

                echo "</tr>";
            }

            ?>


        </table>


    
        <?php } ?>

    


     
</div>
