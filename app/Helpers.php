<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Validator;
use Storage;
use File;

class Helpers extends Model
{
    private static $_role;
    private static $_dataPost;
    private static $_img;
    private static $_generateImgName;
    private static $_request;
    private static $_dbImgs = ['images', 'icon'];

    private static function _getRolesFile($fields)
    {
        $request = self::$_request;
        foreach($fields as $field) {
            switch($field):
                case('images'):
                    $role[$field] = 'required|max:1024|mimes:jpeg,bmp,png';
                    $dataPost[$field] = self::_imgName($field);
                    self::$_img = $request->file($field);
                    break;
                case('icon'):
                    $role[$field] = 'required|max:1024|mimes:jpeg,bmp,png';
                    $dataPost[$field] = self::_imgName($field);
                    self::$_img = $request->file($field);
                    break;
                case('alias'):
                    $role[$field] = 'required|unique:pages';
                    $dataPost[$field] = $request->input($field);
                    break;
                case('text'):
                    $role[$field] = 'required|max:1000';
                    $dataPost[$field] = $request->input($field);
                    break;
                default:
                    $role[$field] = 'required|max:50';
                    $dataPost[$field] = $request->input($field);
                    break;
            endswitch;
        }

        self::$_role = $role;
        self::$_dataPost = $dataPost;
    }

    private static function _imgName($field)
    {
        $request = self::$_request;
        $file = $request->file($field);
        $imgName = substr(
            md5(microtime(true)
            ), -15);

        $imgName .= '.'.explode('/', $file->getClientMimeType())[1];
        self::$_generateImgName = $imgName;

        return $imgName;
    }

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

    public static function saveForm($request, $table, $fields)
    {
        self::$_request = $request;
        self::_getRolesFile($fields);

        Validator::make($request->except('_token'), self::$_role)->validate();

        DB::table($table)->insert(self::$_dataPost);

        //Save file image
        if(self::$_img) {
            self::$_img->move(public_path().'/assets/img', self::$_generateImgName);
        }

        return redirect()->route($table.'.index')->with(['access' => 'Save']);
    }

    public static function delImgFile($data)
    {
        foreach(self::$_dbImgs as $img) {
            if(array_key_exists($img, $data)) {
                $existsImgs[] = $data[$img];
            }
        }

        if($existsImgs) {
            foreach($existsImgs as $existsImg) {
                if(File::exists(public_path().'/assets/img/'.$existsImg)) {
                    File::delete(public_path().'/assets/img/'.$existsImg);
                }
            }
        }
    }

}
