<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;


class CustomerController extends Controller
{

    //  客户列表首页
    public function index()
    {
        echo '111';die;
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
        $Customer = new Customer;
        $Customer->name = $request->post('name');
        $Customer->phone = $request->post('phone');
//        $Customer->user_id = $request->user()->id;
        if($Customer->save()){
            return redirect('/admin');
        }else{
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }



    }
}
