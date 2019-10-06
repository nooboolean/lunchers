<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class LoginForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('email', 'text', ['label' => 'メールアドレス', 'attr'=>['class'=>'form-text form-text-regist']])
            ->add('password', 'password', ['label' => 'パスワード', 'attr'=>['class'=>'form-file form-file-regist']])
            ->add('submit', 'submit', ['label' => 'ログイン', 'attr'=>['class'=>'button button-regist']]);
    }
}
