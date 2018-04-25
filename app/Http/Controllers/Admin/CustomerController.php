<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use DB;
use PhpParser\Node\Expr\Cast\Object_;

class CustomerController extends Controller
{

    //  客户列表首页
    public function index(Request $request)
    {
        $params = [];
        $oara = [];
        if ($request->get('name')){
            $params['name'] = $request->get('name');
        }else{
            $params['name'] = '';

        }
        if($request->get('phone')){
            $params['phone'] = $request->get('phone');
        }else{
            $params['phone'] = '';
        }
        $customer = Customer::getpagingparams($request);
        return view('admin/customer/index', ['customer'=> $customer,'params'=>$params]);

    }

    // 添加客户

    public function add(Request $request)
    {
        $result = [];
        if($request->get('id')){
            $params['id'] = $request->get('id');
            $result = Customer::getinfobyparams($params);
        }
        return view('admin/customer/add',['result'=>$result]);
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
    public function delete ( Request $request){
//        Customer::find()->delete();
        $user_id = $request->get('id');
        $Customer = Customer::find($user_id);
        if($Customer->delete()){
            $status = 200;
        }else{
            $status = 500;
        }
        return response()->json(['status'=>$status]);
    }


    // 判断电话是否存在
    public function isexistphone(Request $request){
        $phone = $request->get('phone');
        $result = Customer::getinfobyparams(['phone'=>$phone]);
        if($result){
            $status = 200;
        }else{
            $status = 500;
        }
        return response()->json(['status'=>$status]);


    }
}
