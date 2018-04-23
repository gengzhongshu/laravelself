@extends('layouts.app')

@section('content')


<div class="page-header headline">
    <h1>顾客列表</h1>
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
                                <input placeholder="按名称" class="form-control" name="name" type="text" value="{{ @$params['name'] }}">
                            </div>
                            <label class="col-sm-1 control-label no-padding-right wid-auto distance-padding-left_0">电话</label>
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
                                电话
                            </th>
                            <th class="" rowspan="1" colspan="1">
                                创建时间
                            </th>
                            <th class="" rowspan="1" colspan="1" style="width:100px">
                                操作
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($customer as $val)
                                <tr id="customer{{$val->id}}" >
                                    <td>{{$val->id}}</td>
                                    <td colspan="1">{{$val->name}}</td>
                                    <td>{{$val->phone}}</td>
                                    <td>{{ $val->created_at ?date('Y-m-d',$val->created_at) :''}}</td>
                                    <td>
                                        <a class=" edit popup-edit" style="width: 20px;" href="/Hyproduct/apparatusinnercate/edit?id=182" title="添加车辆信息"><i class="new-img"></i> </a>
                                        <a class=" edit popup-edit" href="/Hyproduct/apparatusinnercate/edit?id=182" title="编辑"><i class="iconfont icon-bianji"></i> </a>
                                        <a class="delete popup-delete"  data-id="{{$val->id}}" title="删除"><i class="iconfont icon-shanchu"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                           </tbody>
                    </table><!--display-none-->
                </div><!--.widget-body end-->
                <!--分页-->
                <div class="text-right">
                    @if(count($customer))
                        {{ $customer->links() }}
                    @endif;
                </div><!--.btn-decision end-->
            </div><!--.widget end-->
        </div><!--.col-md-9 end-->
    </div><!--.row end-->
</div>
<script>
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