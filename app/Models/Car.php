<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    protected $fillable=['car_name','paizhao','pailiang','customer_id'];

    public static function getpagingparams($params){

        $Car = new Customer;
        //搜索条件判断
        $where = $Car;
        if(isset( $params->car_name) &&  $params->car_name ){
            $where = $where->where('car_name','like',"%".$params['car_name']."%");
        }
        if(isset($params->bar_code) && $params->bar_code ){
            $where = $where->where('bar_code','=',$params['bar_code']);
        }
        $Car = $where->paginate(15);
        if(count($Car) && $Car){
            return $Car;
        }else{
            return [];
        }

    }



}
