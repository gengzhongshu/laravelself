@extends('layouts.app')

@section('content')
    <div class="page-header headline">
        <h1>添加顾客</h1>
    </div><!--.headline end-->
    <div style="width: 500px;height: 500px;">
        {!! $customer->appends(['search_sid'=>$customer->name, 'search_title'=>$customer->phone])->render() !!}
    </div>
@endsection