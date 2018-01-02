<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Helpers extends Model
{
    public static function getNameColumn($table, array $keysDel = [])
    {
        $getColumnsDB = DB::select("SHOW COLUMNS FROM " . $table);
        foreach($getColumnsDB as $getColumnDB) {
            $columns[] = $getColumnDB->Field;
        }

        return array_diff($columns, $keysDel);
    }

    public static function getNamePage($request)
    {
        $arrUrl = explode('/',$request);
        $page = $arrUrl[1];

        return $page;
    }

    public static function bildForm()
    {

    }
}
