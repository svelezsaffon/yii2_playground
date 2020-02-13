<?php
namespace app\models;


use app\models\User;
use yii\base\Model;
use Yii;
use yii\helpers\Url;
use yii\rbac\DbManager;

class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $type;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => 'app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => 'app\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['type', 'required'],
            ['type', 'integer'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {

            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->type=$this->type;

            if ($user->save()) {

                
                $auth = new DbManager;
                $auth->init();
                if($this->type==1){
                    
                    $role = $auth->getRole('user');
                    $auth->assign($role, $user->id);

                }else if($this->type==0){
                    $role = $auth->getRole('seller');
                    $auth->assign($role, $user->id);

                }
 
                $cuenta = new Cuentaverificada();                    
                $cuenta->user=$user->id;  
                $cuenta->hash=hash('sha256', $user->id."_somesalt");
                $cuenta->save();

                $servername=Yii::$app->urlManager->createAbsoluteUrl(['cuentaverificada/verify', 'hash' => $cuenta->hash]);
                
                Yii::$app->mailer->compose('layouts/register', ['content' => $servername])
                ->setFrom('notificaciones@servicio247.co')
                ->setTo($user->email)
                ->setSubject("Bienvenido a servicio 247")
                ->send();


                Yii::$app->mailer->compose('layouts/newuser', ['id'=>$user->id,'nombre'=>$user->username])
                ->setFrom('notificaciones@servicio247.co')
                ->setTo('notificaciones@servicio247.co')
                ->setSubject("Nuevo usuario")
                ->send();                


                return $user;

            }else{
                return null;

            }



        }

        return null;
    }
}
