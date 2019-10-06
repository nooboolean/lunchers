<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TwitterUser extends Model
{
    //
    public static function ExistsConnectedSnsUser($sns_id){
         if(!$get_sns_id = self::getSnsId($sns_id)){
             return false;
         }
        $connect_user = self::connectedUser($get_sns_id);
        return !is_null($connect_user);
    }

    private static function connectedUser($sns_id){
        return self::where('sns_id', $sns_id)->where('connected_flag', 1)->value('sns_id');//ここにコネクトフラグも見るようにするんご
    }
    private static function getSnsId($sns_id){
        return self::where('sns_id', $sns_id)->value('sns_id');
    }
    public static function getUser($sns_id){
        return self::where('sns_id', $sns_id)->first();
    }
}
