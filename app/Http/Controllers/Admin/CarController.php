<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Customer;

class CarController extends Controller
{
    public function __construct()
    {
        $this->customer = Customer::all();
    }

    //
    public function index(Request $request){
        $params = [];
        if ($request->get('car_name')){
            $params['car_name'] = $request->get('car_name');
        }else{
            $params['car_name'] = '';
        }
        if ($request->get('bar_code')){
            $params['bar_code'] = $request->get('bar_code');
        }else{
            $params['bar_code'] = '';
        }

        $car = Car::getpagingparams($request);
        return view('admin/car/index', ['car'=> $car,'params'=>$params,'customer' =>$this->customer]);
    }

    // 添加客户

    public function add(Request $request)
    {
        $result = [];
        if($request->get('id')){
            $params['id'] = $request->get('id');
            $result = Customer::getinfobyparams($params);
        }
        return view('admin/car/add',['customer'=>$this->customer,'result'=>$result]);
    }



}
