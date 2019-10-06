<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use App\Models\Department;

class RegistForm extends Form
{
    public function buildForm()
    {
        list($id, $name) = $this->getDepartments();
        $choice_list = array_combine($id, $name);
        $this
            ->add('name', 'text', ['label' => 'ニックネーム', 'attr'=>['class'=>'form-text form-text-regist']])
            ->add('image', 'file', ['label' => 'アイコン', 'attr'=>['class'=>'form-file form-file-regist']])
            ->add('department', 'select', ['label' => '所属部署', 'choices' => $choice_list, 'attr'=>['class'=>'from-select form-select-regist']])
            ->add('email', 'text', ['label' => 'メールアドレス', 'attr'=>['class'=>'form-text form-text-regist']])
            ->add('password', 'password', ['label' => 'パスワード', 'attr'=>['class'=>'form-text form-text-regist']])
            ->add('confirm_password', 'password', ['label' => 'パスワード確認', 'attr'=>['class'=>'form-text form-text-regist']])
            ->add('submit', 'submit', ['label' => '会員登録', 'attr'=>['class'=>'button button-regist']]);
    }

    private function getDepartments(){
        $department = new Department;
        return $department->get_all();
    }
}
