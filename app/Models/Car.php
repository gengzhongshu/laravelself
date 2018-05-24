<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Car extends Model
{
    //
    protected $fillable=['car_name','paizhao','pailiang','customer_id'];

    /**
     * 获取关联到用户的手机
     */
    public function user()
    {

        /*Eloquent 假设外键应该在父级上有一个与之匹配的id，换句话说，Eloquent 将会通过user表的id值去phone表中查询user_id与之匹配的Phone记录。如果你想要关联关系使用其他值而不是id，可以传递第三个参数到hasOne来指定自定义的主键：*/
//        return $this->hasOne('App\Models\Customer', 'id','customer_id');
        return $this->belongsTo('App\Models\Customer', 'id');
        //说白了就是hasOne('关联Eloquent', '被关联表的key', '本表key')
    }

    public static function getpagingparams($params){
        $Car = new car;
        //搜索条件判断
        $where = $Car;
        if(isset( $params->car_name) &&  $params->car_name ){
            $where = $where->where('car_name','like',"%".$params['car_name']."%");
        }
        if(isset($params->bar_code) && $params->bar_code ){
            $where = $where->where('bar_code','=',$params['bar_code']);
        }
        if(isset($params->customer_id) && $params->customer_id){
            $where = $where->where('customer_id','=',$params['customer_id']);
        }
//        DB::enableQueryLog();
        $Car= $where::leftJoin('customer as c', 'cars.customer_id', '=', 'c.id')->select(['cars.*','c.name as customername'])->paginate(15);
//        dd(DB::getQueryLog());die;
        if(count($Car) && $Car){
            return $Car;
        }else{
            return [];
        }

    }



}
