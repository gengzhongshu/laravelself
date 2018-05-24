@extends('layouts.app')

@section('content')


<div class="page-header headline">
    <h1>车辆信息</h1>
</div><!--.headline end-->
<div class="page-body page-con">
    <div class="row">
        <div class="col-md-12 space-left">
            <div class="widget">
                <div id="horizontal-form">
                    <form role="form" class="form-horizontal" method="get" action="">
                        <div class="form-group">
                            <label class="col-sm-1 control-label no-padding-right wid-auto distance-padding-left_0">姓名</label>
                            <div class="col-sm-2">
                                <select id="customerId" style="width:100%;">
                                    @if(count($customer))
                                    @foreach ($customer as $val)
                                       <option value="{{isset($val['id'])?$val['id']:''}}" @if($val['id'] == @$params['customer_id']) selected @endif>{{isset($val['name'])?$val['name']:''}}</option>
                                    @endforeach
                                    @else
                                        <option>请添加用户</option>
                                    @endif
                                </select>
                            </div>
                            <label class="col-sm-1 control-label no-padding-right wid-auto distance-padding-left_0">车辆名称</label>
                            <div class="col-sm-2">
                                <input placeholder="按名称" class="form-control" name="car_name" type="text" value="{{ @$params['car_name'] }}">
                            </div>
                            <label class="col-sm-1 control-label no-padding-right wid-auto distance-padding-left_0">车牌查询</label>
                            <div class="col-sm-2">
                                <input placeholder="电话" class="form-control" name="phone" type="text" value="{{ @$params['phone'] }}">
                            </div>
                            <button class="btn btn-sm btn-blues active addition new" style="border-radius:5px" type="submit">搜索</button>
                        </div>
                    </form>
                </div><!--#horizontal-form end-->
                <div class="widget-header">
                    <span class="widget-caption">顾客列表</span>
                    <button class="btn btn-lg btn-orange active additioned new" type="button" onclick="javascript:location.href='/admin/add'"><i class="new-img"></i>添加顾客</button>
                </div>
                <div class="widget-body ">
                    <table id="innercate-table" class="table table-hover">
                        <thead>
                        <tr>
                            <th>
                                序号
                            </th>
                            <th class="" rowspan="1" colspan="1">
                                名称
                            </th>
                            <th class="" rowspan="1" colspan="1">
                                拍照
                            </th>
                            <th class="" rowspan="1" colspan="1">
                                排量
                            </th>
                            <th class=""  style="width:100px">
                                名称
                            </th>
                            <th >
                                创建时间
                            </th>
                             <th class="" rowspan="1" colspan="1" style="width:100px">
                                操作
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($car))
                            @foreach ($car as $val)
                                <tr id="customer{{$val->id}}" >
                                    <td>{{$val->id}}</td>
                                    <td colspan="1">{{$val->car_name}}</td>
                                    <td>{{$val->paizhao}}</td>
                                    <td>{{ $val->pailiang}}</td>
                                    <td>{{ $val->customername}}</td>
                                    <td>{{ $val->created_at}}</td>
                                    <td>
                                        <a class=" edit popup-edit" style="width: 20px;" href="/admin/add?id={{$val->id}}" title="添加车辆信息"><i class="iconfont icon-add"></i></a>
                                        <a class=" edit popup-edit" href="/admin/add?id={{$val->id}}" title="编辑"><i class="iconfont icon-edit"></i> </a>
                                        <a class="delete popup-delete"  data-id="{{$val->id}}" title="删除"><i class="iconfont icon-delete"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr >
                                <td colspan="5">暂无数据!</td>
                            </tr>
                        @endif

                        </tbody>
                    </table><!--display-none-->
                </div><!--.widget-body end-->
                <!--分页-->
                <div class="text-right">
                    {{--@if(count($customer))--}}
                        {{--{{ $customer->links() }}--}}
                    {{--@endif;--}}
                </div><!--.btn-decision end-->
            </div><!--.widget end-->
        </div><!--.col-md-9 end-->
    </div><!--.row end-->
</div>
<script>
$('#customerId').select2({
        language: {
             noResults: function (params) {
             return "暂无数据";
         }
         }
})
$('.delete').click(function(){
    $id  = $(this).data('id');
    // ajax 删除
    layer.confirm('您确定要删除当前顾客么？', {
      btn: ['确定','取消'] //按钮
    }, function(){
        layer.load(1);
        $.ajax({
            type: 'POST',
            url: '/admin/delete',
            data: { id : $id},
            dataType: 'json',
            headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }, success: function(data){
            if(data.status ==200){
                layer.alert('删除成功');
                location.href.reload();
//                $('#customer'+$id).remove();
            }else{
                layer.alert('删除失败');
            }
        }
        });
    });


})
</script>
@endsection