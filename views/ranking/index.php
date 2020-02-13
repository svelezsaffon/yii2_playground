<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\bootstrap\Modal;


$this->title = 'Puntuaciones';
$this->params['breadcrumbs'][] = $this->title;


Modal::begin([
    'header'=>'<h4>¿Como te fue con el servicio?</h4>',
    'id'=>'modal',
    'size'=>'modal-lg',    
    ]);
echo '<div id="modalContent"></div>';
Modal::end();
?>

<script type="text/javascript">
.table td {
   text-align: center;   
}
</script>


<div class="ranking-index">

    <section id="ranking">
    
        <div class="row">
            <div class="jumbotron">
                <h2 class="section-heading"><?= Html::encode($this->title) ?></h2>
                <p>Dar putnuaciones y recomendaciones nos ayuda a mejorar nuestro servicio, encontraras la lista de servicios que podras dar puntuaciones</p>
                
            </div>

        </div>

        <table class="table table-hover">
        
            <tr>
                <th>Tipo de servicio</th>                     
                <th>Servicio a pagar</th>                                           
                <th>Pagar</th>
            </tr>
            <?php
            foreach ($rankings as $ranking){ 
                echo "<tr>";
                    
                    echo "<td> ";
                        echo '<span class="fa-stack fa-2x yeti" >';
                            echo '<i class="fa '.$ranking['icon'].' yeti fa-stack-1x fa-inverse"></i> ';       
                            
                    echo "</span>";
                    echo $ranking['nombre'];   
                    echo "</td>";

                    echo "<td>";
                        echo Html::a('<i class="fas fa-edit"></i> Ver servicio',['/servicioxdia/view', 'id' => $ranking['idservicio']], ['class' => 'btn btn-black yeti', 'title' => 'Sign Up']);

                    echo "</td>";

                    echo "<td>"; 
                        
                        echo Html::button('<i class="far fa-smile"></i> Calificar', [
                             'value'=>Url::to(['/ranking/creates','ids'=>$ranking['idservicio'],'idt'=>$ranking['trabajador']]),   
                            'class' => 'btn btn-default yeti', 'id'=>'modalButton' ,'title' => 'cali']);

                    echo "</td>";

                echo "</tr>";
            }

            ?>


        </table>


    </section>

</div>
