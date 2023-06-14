<?php
namespace app\models;
use Yii;
use yii\base\Exception;
use yii\base\Model;
use yii\behaviors\BlameableBehavior;


/**
 * Signup form
 */
class SignupForm extends Model
{
    public $login;
    public $name;
    public $patronymic;
    public $surname;
    public $email;
    public $password;
    public $password_repeat;
    public $agree;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['login', 'trim'],
            ['login', 'required'],
            ['login', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Этот логин уже занят.'],
            ['login', 'string', 'min' => 4, 'max' => 255],

            [['login'], 'match', 'pattern' => '/^[A-Za-z\w*\-]+$/i', 'message'=>'Только латиница, цифры и тире'],
            [['name', 'patronymic', 'surname'], 'match', 'pattern' => '/^[А-ЯЁа-яё\s\-]+$/u', 'message'=>'Только кириллица, пробел и тире'],

            ['name', 'trim'],
            ['name', 'required'],
            ['name', 'string', 'max' => 100],

            ['patronymic', 'trim'],
            ['patronymic', 'required'],
            ['patronymic', 'string', 'max' => 100],

            ['surname', 'trim'],
            ['surname', 'required'],
            ['surname', 'string', 'max' => 100],
            [['login', 'email'], 'unique', 'targetClass' => User::class],
            ['email', 'trim'],
            [['created_at', 'updated_at'], 'safe'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Этот адрес электронной почты уже занят.'],


            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            [['email'], 'email', 'message'=>'Некорректный email'],
            [['password_repeat'], 'compare', 'compareAttribute' => 'password', 'message'=>'Пароли не совпадают'],
            ['agree', 'boolean'],
            ['agree', 'compare', 'compareValue' => true, 'message'=>'Не дано согласие на обработку данных'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [

            'login' => 'Логин',
            'name' => 'Имя',
            'patronymic' => 'Отчество',
            'surname' => 'Фамилия',
            'password' => 'Пароль',
            'email' => 'Почта',
            'password_repeat' => 'Повторите пароль',
            'agree' => 'Даю согласие на обработку персональных данных',
        ];
    }


    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     * @throws Exception
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $user->login = $this->login;
        $user->name = $this->name;
        $user->patronymic = $this->patronymic;
        $user->surname = $this->surname;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
//        var_dump($user);

        return $user->save() ? $user : null;
    }
}

