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
                            <input type="hidden" id="id" name="id" value="">
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-right wid-8">顾客姓名</label>
                                <div class="col-sm-7">
                                    <input type="text" placeholder="顾客姓名" class="form-control" id="name" name="name" value="{{ isset($result['name'])?$result['name']:''}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-right wid-8">电话</label>
                                <div class="col-sm-7">
                                    <input id="phone" type="text" placeholder="请输入电话号码" onchange="isexistphone({{isset($result['phone'])?$result['phone']:''}})" class="form-control" name="phone" value="{{isset($result['phone'])?$result['phone']:''}}">
                                </div>
                            </div>
                            <div class="form-group btn-next text-right no-padding-right distance-top_15">
                                <input type="hidden" value="{{isset($result['id'])?$result->id:''}}" name="id" id="id">
                                <button class="btn btn-lg  btn-blues active next" id="save">完成</button>
                            </div>
                        </form>
                    </div><!--.horizontal-form end-->
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
            }
            if (!phone || isNaN(phone)){
                layer.alert('电话不能为空');
                $('#phone').focus();
            }
            $.ajax({
                type: 'POST',
                url: '/admin/save',
                data: { name : name,phone:phone,id:id},
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


        })
        function isexistphone(phone){
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