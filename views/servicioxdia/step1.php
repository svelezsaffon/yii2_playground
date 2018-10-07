<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">¿Necesitas un servicio de solo un dia?></h3>
  </div>
  <div class="panel-body">

    <div class="row"> 
      <?php
        $dires=array();
        $index=0;
        foreach ($allServicios as $servicioe){
          $dires[$index]=$servicioe;
          $index=$index+1;
        }

        echo $form->field($model, 'servicio')->radioList(
      $dires  ,
    ['item' => function ($index, $label, $name, $checked, $value) {
        return
        '
        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">      
              <div class="caption">
                <div class="row">
                  <div class="col-lg-7">
                    <h4>'.$label->nombre.'</h4>
                  </div>
                  <div class="col-lg-5">
                    <h4>'.\yii\bootstrap\Html::radio($name, $checked,['value' => $label->id,'label' => 'Escoger',]).'</h4>
                  </div>
                </div>
              </div>
          </div>
        </div>
        ';
    }]
)->label(false);
  
?>  

    </div>

  </div>
</div>
