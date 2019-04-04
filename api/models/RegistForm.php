<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 2019-01-30
 * Time: 15:11
 */

namespace api\models;


use common\models\Adminuser;
use yii\base\Model;

class RegistForm extends Model
{
    public $username;
    public $password;
    public $email;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password', 'email'], 'required'],
            ['username', 'validateUsername'],
            ['email', 'validateEmail'],
        ];
    }

    public function regist()
    {
        if ($this->validate()) {
            $user = new Adminuser();
            $user->username = $this->username;
            $user->realname = "hwh1";
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->generatePasswordResetToken();
            return $user->save() ? $user : null;
        } else {
            return null;
        }
    }


    public function validateUsername($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUserByUserName();
            if ($user) {
                $this->addError($attribute, 'username已经存在.');
            }
        }
    }


    public function validateEmail($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUserByEmail();
            if ($user) {
                $this->addError($attribute, 'email已经存在.');
            }
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUserByUserName()
    {

        $user = Adminuser::findByUsername($this->username);

        return $user;
    }


    public function getUserByEmail()
    {

        $user = Adminuser::findByEmail($this->email);

        return $user;
    }


}