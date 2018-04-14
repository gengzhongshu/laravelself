<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use DB;
class CustomerController extends Controller
{

    //  客户列表首页
    public function index(Request $request)
    {
        $params = [];
        if ($request->get('name')){
            $params['name'] = $request->get('name');
        }
        if($request->get('phone')){
            $params['phone'] = $request->get('phone');
        }
        $customer = Customer::getpagingparams($request);
        return view('admin/customer/index', ['customer'=> $customer]);

    }

    // 添加客户

    public function add()
    {
        return view('admin/customer/add');
    }

    public function  save( Request $request){

        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
        ]);
        $customerArr['name'] = $request->get('name');
        $customerArr['phone'] = $request->get('phone');
        $status = Customer::saveparams($customerArr);

//        $Customer->user_id = $request->user()->id;
        if($status){
            return redirect('/admin');
        }else{
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }



    }
}
