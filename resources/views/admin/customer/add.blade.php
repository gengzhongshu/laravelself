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
                                <label class="col-sm-2 control-label no-padding-right wid-8">名称</label>
                                <div class="col-sm-7">
                                    <input type="text" placeholder="类别名称" class="form-control" id="name" name="name" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-right wid-8">电话</label>
                                <div class="col-sm-7">
                                    <input type="text" placeholder="请输入电话号码" class="form-control" name="phone" value="">
                                </div>
                            </div>
                            <div class="form-group btn-next text-right no-padding-right distance-top_15">
                                <button class="btn btn-lg active next" type="submit">完成</button>
                            </div>
                        </form>
                    </div><!--.horizontal-form end-->
                </div>

            </div><!--.col-md-12 end-->

        </div><!--.row end-->
    </div><!--.page-body end-->
@endsection