<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \App\Modules\ImageUpload;

class User extends Authenticatable
{
    public static function set_all($input){
        $pass_hash = password_hash($input->password, PASSWORD_BCRYPT);
        $upload_image = $input->image;
        $image = ImageUpload::make_image($upload_image);
        if(!$image){
            $image_path = null;
        } else {
            $image = $image_upload->sizing_crop($image, 300, 200);
            $image_upload->save($image, $upload_image);
            $image_path = '/images/' . $upload_image->hashName();
        }

        self::insert([
            "name" => $input->name,
            "email" => $input->email,
            "department_id" => $input->department,
            "image_path" => $image_path,
            "pass_hash" => $pass_hash
        ]);
    }

    public static function get_all($email){
        $user = self::where('email', $email)->first();
        return $user;
    }
}
