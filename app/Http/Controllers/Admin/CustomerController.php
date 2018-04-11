<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use DB;
class CustomerController extends Controller
{

    //  客户列表首页
    public function index()
    {

        $users = DB::table('Customer')->paginate(15);

        return view('admin.customer.index',['users' => $users]);


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
