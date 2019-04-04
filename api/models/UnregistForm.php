<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 2019-01-31
 * Time: 16:04
 */

namespace api\models;


use common\models\Adminuser;
use yii\base\Model;

class UnregistForm extends Model
{

    public $username;
    public $password;
    public $email;
    private $_user;

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
            ['password', 'validatePassword'],
        ];
    }


    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }


    public function validateUsername($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUserByUserName();
            if (!$user) {
                $this->addError($attribute, 'username不存在.');
            }
        }
    }


    public function validateEmail($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUserByEmail();
            if (!$user) {
                $this->addError($attribute, 'email不存在.');
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

        if ($this->_user === null) {
            $this->_user = Adminuser::findByUsername($this->username);
        }

        return $this->_user;
    }


    public function getUserByEmail()
    {

        if ($this->_user === null) {
            $this->_user = Adminuser::findByEmail($this->email);
        }

        return $this->_user;
    }


    public function unRegist(){
       if($this->validate()){
            $this->_user->delete();
            return $this->_user;
       }else{
           return null;
       }
    }


    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = Adminuser::findByUsername($this->username);
        }

        return $this->_user;
    }

}