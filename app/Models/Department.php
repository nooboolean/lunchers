<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    public function get_all(){
        $departments = $this->get();
        $id = array(null);
        $name = array("ご自身の部署を選択してください");
        foreach($departments as $index => $dep){
            $id[$index+1] = $dep->id;
            $name[$index+1] = $dep->name;
        }
        return [$id, $name];
    }
}
