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



        <div class="row">
            <div class="jumbotron">
                <h1 class="section-heading"><?= Html::encode($this->title) ?></h1>
                <p>En esta seccion encontraras el listado de pagoes que debes realizar y de los pagos ya realizados</p>                
            </div>
        </div>


        <div class="row">   
            <h3 class="well text-center">Listado de los servicios que debes pagar</h3>
        </div> 

        <table class="table table-hover">
        
            <tr>
                <th>Tipo de servicio</th>     
                <th>Fecha del servicio</th>
                <th>Servicio a pagar</th>                                           
                <th>Monto</th>
                <th>Pagar</th>
            </tr>
            <?php
            foreach ($pagos as $pago){ 
                echo "<tr>";
                    
                    echo "<td> ";
                        echo '<span class="fa-stack fa-2x yeti" >';
                            echo '<i class="fa '.$pago['icon'].' yeti fa-stack-1x fa-inverse"></i> ';       
                            
                    echo "</span>";
                    echo $pago['nombre'];   
                    echo "</td>";

                    echo "<td>";
                            echo $pago['fecha'];                        
                    echo "</td>";

                    echo "<td>";
                        echo Html::a('<i class="fas fa-edit"></i> Ver servicio',['/servicioxdia/view', 'id' => $pago['servicioid']], ['class' => 'btn btn-black yeti', 'title' => 'Sign Up']);

                    echo "</td>";

                    echo "<td>";

                            echo "$ ".Yii::$app->formatter->asCurrency($pago['monto'], 'COP');                        
                    echo "</td>";

                    echo "<td>"; 
                        
                        echo Html::a('<i class="fas fa-dollar-sign"></i> Pagar',['/pago/update','id'=>$pago['pagoid']], ['class' => 'btn btn-black yeti', 'title' => 'Pagar']);

                    echo "</td>";

                echo "</tr>";
            }

            
            foreach ($pagos_planes as $pago){ 
                echo "<tr>";
                    
                    echo "<td> ";
                        echo '<span class="fa-stack fa-2x yeti" >';
                            echo '<i class="fa '.$pago['icon'].' yeti fa-stack-1x fa-inverse"></i> ';       
                            
                    echo "</span>";
                    echo $pago['nombre'];   
                    echo "</td>";

                    echo "<td>";
                            echo $pago['fecha'];                        
                    echo "</td>";

                    echo "<td>";
                        echo Html::a('<i class="fas fa-edit"></i> Ver servicio',['/plane/view', 'id' => $pago['servicioid']], ['class' => 'btn btn-black yeti', 'title' => 'Sign Up']);

                    echo "</td>";

                    echo "<td>";

                            echo "$ ".Yii::$app->formatter->asCurrency($pago['monto'], 'COP');                        
                    echo "</td>";

                    echo "<td>"; 
                        
                        echo Html::a('<i class="fas fa-dollar-sign"></i> Pagar',['/pago/update','id'=>$pago['pagoid']], ['class' => 'btn btn-black yeti', 'title' => 'Pagar']);

                    echo "</td>";

                echo "</tr>";
            }

            ?>


        </table>

     
</div>
