<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Validator;

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

    public static function delKeysFromArray($arr, array $arrKeysDel) {
        foreach($arrKeysDel as $key) {
            $keyDel = array_key_exists($key, $arr);
            if($keyDel) {
                unset($arr[$key]);
            }
        }
        
        return $arr;
    }

    public static function getNamePage($request)
    {
        $arrUrl = explode('/',$request);
        $page = $arrUrl[1];

        return $page;
    }

    public static function valFieldForm($request, $table, $fields)
    {
        foreach($fields as $field) {
            switch($field):
                case('images'):
                    $role[$field] = 'required|max:1024|mimes:jpeg,bmp,png';
                    $file = $request->file('images');
                    break;
                case('icon'):
                    $role[$field] = 'required|max:1024|mimes:jpeg,bmp,png';
                    $file = $request->file('icon');
                    break;
                case('alias'):
                    $role[$field] = 'required|unique:pages';
                    $data[$field] = $request->all()[$field];
                    break;
                case('text'):
                    $role[$field] = 'required|max:1000';
                    $data[$field] = $request->all()[$field];
                    break;
                default:
                    $role[$field] = 'required|max:50';
                    $data[$field] = $request->all()[$field];
                    break;
            endswitch;
        }

        Validator::make($request->except('_token'), $role)->validate();

        DB::table($table)->insert($request->except('_token'));

        if($file) {
            $imgName = substr(
                md5(microtime(true)
            ), -15);

            $file->move(public_path().'/assets/img', $imgName);
        }
        return redirect()->route($table.'.index')->with(['access' => 'Save']);
    }
}
