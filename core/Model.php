<?php

namespace Core;

use Exception;
use RedBeanPHP\R;

class Model
{
    protected static string $table;

    public static function all(){
        return R::findAll(static::$table);
    }

    public static function find($id){
        return R::load(static::$table, $id);
    }

    public static function findByOne($column, $value){
        return R::findOne(static::$table, "$column = ?", [$value]);
    }

    public static function exists($column, $value){
        return R::findOne(static::$table, "$column = ?", [$value]) !== null;
    }

    public static function create(array $data){
        $bean = R::dispense(static::$table);

        foreach($data as $key => $value){
            $bean->$key = $value;
        }

        return R::store($bean);
    }

    public static function findOrFail($id)
    {
        $model = static::find($id);

        if ($model->id == 0) {
            throw new Exception('Recurso no encontrado', 404);
        }

        return $model;
    }


}