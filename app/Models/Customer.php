<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;


class Customer extends Model
{
    //
    protected $table = 'customer';
    protected $fillable=['card','user_id','name','bankName','province','city','branch'];


    public static function saved($callback, $priority = 0)
    {
        parent::saved($callback, $priority); // TODO: Change the autogenerated stub
    }

    public static function getpagingparams($params){

        $Customer = new Customer;
        //搜索条件判断
        $where = $Customer;
        if(isset( $params->name) &&  $params->name ){
            $where = $where->where('name','like',"%".$params['name']."%");
        }
        if(isset($params->phone) && $params->phone ){
            $where = $where->where('phone','=',$params['phone']);
        }
        $Customer = $where->paginate(15);
        if(count($Customer) && $Customer){
            return $Customer;
        }else{
            return [];
        }

    }

    public static function saveparams($arr)
    {
        $Customer = new Customer; // 初始化 Article 对象
        $Customer->name = $arr['name']; // 将 POST 提交过了的 title 字段的值赋给 article 的 title 属性
        $Customer->phone =  $arr['phone'];
        if ($Customer->save()){
            return true;
        }else{
            return false;
        }
    }
    public static function getinfobyparams($params){

        $Customer = new Customer;
        $where = $Customer;

        if(isset($params['id']) && $params['id']){
            $where = $where->where('id','=',$params['id']);
        }
        if(isset($params['phone']) && $params['phone']){
            $where = $where->where('phone','=',$params['phone']);
        }
        $row = $where->first();
        if (count($row) && $row){
            return $row;
        }else{
            return [];
        }

    }
}
