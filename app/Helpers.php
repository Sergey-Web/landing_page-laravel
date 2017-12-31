<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Helpers extends Model
{
    public static function delKeysFromArray($arr, array $arrKeysDel) {
        foreach($arrKeysDel as $key) {
            $keyDel = array_key_exists($key, $arr);
            if($keyDel) {
                unset($arr[$key]);
            }
        }
        
        return $arr;
    }
}