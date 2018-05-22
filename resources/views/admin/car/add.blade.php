@extends('layouts.app')

@section('content')
    <div class="page-header headline">
        <h1>添加顾客</h1>
    </div><!--.headline end-->
    <div class="page-body ">
        <div class="row">
            <div class="col-md-12">
                <div class="widget-body">
                    <div id="horizontal-form">
                        <form role="form" class="form-horizontal" method="post" action="save">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-right wid-8">车辆名称</label>
                                <div class="col-sm-7">
                                    <input type="text" placeholder="车辆名称" class="form-control" id="name" name="name" value="{{ isset($result['car_name'])?$result['car_name']:''}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-right wid-8">拍照</label>
                                <div class="col-sm-7">
                                    <input id="phone" type="text" placeholder="车牌照" onchange="isexistplatename()" class="form-control" name="paizhao" value="{{isset($result['paizhao'])?$result['paizhao']:''}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-right wid-8">排量</label>
                                <div class="col-sm-7">
                                    <input id="phone" type="text" placeholder="排量" class="form-control" name="pailiang" value="{{isset($result['pailiang'])?$result['pailiang']:''}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-right wid-8">客户名</label>
                                <div class="col-sm-7">
                                    <select>
                                        @if(count($customer))
                                        @foreach ($customer as $val)
                                           <option value="{{isset($val['id'])?$val['id']:''}}" @if($val['id'] == $result['customer_id']) selected @endif>{{isset($val['name'])?$val['name']:''}}</option>
                                        @endforeach
                                        @else
                                            <option>请添加用户</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group btn-next text-right no-padding-right distance-top_15">
                                <input type="hidden" value="{{isset($result['id'])?$result['id']:''}}" name="id" id="id">
                            </div>
                        </form>
                    </div><!--.horizontal-form end-->
                </div>
                <div class="form-group btn-next text-right no-padding-right distance-top_15">
                                        <button class="btn btn-lg  btn-blues active next" id="save">完成</button>
                                    </div>

            </div><!--.col-md-12 end-->

        </div><!--.row end-->
    </div><!--.page-body end-->
    <script>
        $('#save').click(function () {
            var name = $('#name').val();
            var phone = $('#phone').val();
            var id = $('#id').val();
            if (!name){
                layer.alert('顾客姓名为空');
                $('#name').focus();
                return;
            }
            if (!phone || isNaN(phone)){
                layer.alert('电话不能为空');
                $('#phone').focus();
                return;
            }
            $.ajax({
                type: 'POST',
                url: '/admin/save',
                data: { name : name,phone:phone,id:id},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }, success: function(data){
                    if(data.status ==1){

//                        window.location.href='/admin';
                    }
                }
            });


        })
        function isexistphone(phone){
            var phone = $('#phone').val();
            $.ajax({
                type: 'POST',
                url: '/admin/isexistphone',
                data: { phone : phone},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }, success: function(data){
                    if(data.status ==200){
                        layer.alert('您输入的电话已经存在');
                        $('#phone').val('').focus();
                    }
                }
            });
        }
    </script>
@endsection