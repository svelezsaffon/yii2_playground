<?php

namespace app\mail;

class Helper{


    public function send_email($message,$subject){
        
        Yii::$app->mailer->compose('layouts/html', ['content' => $message])
        ->setFrom('notificaciones@servicio247.co')
        ->setTo('svelezsaffon@gmail.com')
        ->setSubject($subject)
        ->send();
    }


}


?>