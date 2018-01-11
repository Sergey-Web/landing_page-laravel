<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use DB;
use Validator;
use Storage;
use File;
use Image;

class Helpers extends Model
{
    private const IMG = ['images', 'icon'];
    private static $_id;
    private static $_role;
    private static $_dataPost;
    private static $_img;
    private static $_generateImgName;
    private static $_fieldsData;
    private static $_table;

    private static function _getRolesFile($fields)
    {
        $fieldsData = self::$_fieldsData;
        foreach($fields as $field) {
            switch($field):
                case('images'):
                    if(!isset($fieldsData[$field])) break;

                    $role[$field] = 'max:1024|mimes:jpeg,bmp,png';
                    $dataPost[$field] = self::_imgName($field);
                    self::$_img = $fieldsData[$field];

                    break;
                case('icon'):
                    if(!isset($fieldsData[$field])) break;

                    $role[$field] = 'max:1024|mimes:jpeg,bmp,png';
                    $dataPost[$field] = self::_imgName($field);
                    self::$_img = $fieldsData[$field];

                    break;
                case('alias'):
                    $role[$field] = ['required', Rule::unique(self::$_table)->ignore(self::$_id)];
                    $dataPost[$field] = $fieldsData[$field];

                    break;
                case('text'):
                    $role[$field] = 'required|max:1000';
                    $dataPost[$field] = $fieldsData[$field];

                    break;
                default:
                    $role[$field] = 'required|max:50';
                    $dataPost[$field] = $fieldsData[$field];

                    break;
            endswitch;
        }

        self::$_role = $role;
        self::$_dataPost = $dataPost;
    }

    private static function _imgName($field)
    {
        $fieldsData = self::$_fieldsData;
        $file = $fieldsData[$field];
        $imgName = substr(
            md5(microtime(true)
            ), -15);

        $imgName .= '.' . explode('/', $file->getClientMimeType())[1];
        self::$_generateImgName = $imgName;

        return $imgName;
    }

    private static function _delImgByName()
    {
        foreach(self::IMG as $valField) {
            if(array_key_exists($valField, self::$_fieldsData)) {
                $existsImg[] = $valField;
            }
        }

        $existsImg = implode(',', $existsImg);

        $getNameImg = DB::table(self::$_table)->select($existsImg)->where('id', self::$_id)->first();
        foreach($getNameImg as $nameImg) {
            File::delete(public_path().'/assets/img/'.$nameImg);
        }
    }

    public static function getNameColumn($table, array $keysDel = [])
    {
        $getColumnsDB = DB::select("SHOW COLUMNS FROM " . $table);
        foreach($getColumnsDB as $getColumnDB) {
            $columns[] = $getColumnDB->Field;
        }

        return array_diff($columns, $keysDel);
    }

    public static function delKeysFromArray($arr, array $arrKeysDel)
    {
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

    public static function saveForm($fieldsData, $table, $fieldsName, $id = FALSE)
    {
        self::$_id = $id;
        self::$_fieldsData = $fieldsData;
        self::$_table = $table;
        self::_getRolesFile($fieldsName);

        Validator::make($fieldsData, self::$_role)->validate();

        if($id) {
            if(self::$_img) {
                self::_delImgByName($id);
            }
            DB::table($table)->where('id', $id)->update(self::$_dataPost);
        } else {
            DB::table($table)->insert(self::$_dataPost);
        }

        //Save file image
        if(self::$_img) {
            self::$_img->move(public_path().'/assets/img', self::$_generateImgName);
        }

        return redirect()->route($table.'.index')->with(['access' => 'Save']);
    }

    public static function delImgFile($data)
    {
        foreach(self::IMG as $img) {
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
