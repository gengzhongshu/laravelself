<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ Config::get('constants.title_name')}}</title>

<!-- Fonts -->
    <link rel="stylesheet"   href="{{ asset('assets/css/font-awesome.css') }}"  >

    <link rel="stylesheet"   href="{{ asset('assets/iconfont/ux_1464852498_232132/demo.css') }}"  >
    <link rel="stylesheet"   href="{{ asset('assets/iconfont/ux_1464852498_232132/iconfont.css') }}"  >
{{--<link rel="stylesheet" href="http://fonts.useso.com/css?family=Lato:100,300,400,700">--}}

<!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" >
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
<div class="main-container container-fluid">
        <div class="page-container con-basic" id="left_top">

            <div class=" con-sidebar">
            <!--左边开始-->
                <div class="left" id="left_up">

                <ul class="expmenu help-center">
                    <li>
                        <div class="header none">
                            <a>
                                <i class="iconfont icon-guanli"></i>
                                <span class="label" >器械包管理</span>
                                <span class="arrow up"></span>
                            </a>
                        </div>
                                <span class="no">
                                    <ul class="menu" style="display:block;">
<!--                                        <li class="on"><a href="/Hyproduct/operation/index"><i class="iconfont icon-shoushufenlei"></i>手术管理</a></li>-->
<!--                                        <li><a href="/Hyproduct/operationcate/index"><i class="iconfont icon-moban"></i>手术类别管理</a></li>-->
<!--                                        <li><a href="/Hyproduct/operationhistory/index"><i class="iconfont icon-moban"></i>手术记录管理</a></li>-->
<!--                                        <li><a href="/Hyproduct/brand/index"><i class="iconfont icon-moban"></i>品牌管理</a></li>-->
<!--                                        <li><a href="/Hyproduct/apparatussyscate/index"><i class="iconfont icon-moban"></i>系统类别管理</a></li>-->
                                        <li><a href="/Hyproduct/apparatusinnercate/index"><i class="iconfont icon-moban"></i>内部类别管理</a></li>
                                        <li><a href="/Hyproduct/apparatus/index"><i class="iconfont icon-guanli1"></i>器械字典管理</a></li>
                                        <li><a href="/Hyproduct/apparatuscombo/index"><i class="iconfont icon-moban"></i>器械包模板</a></li>
                                        <li><a href="/Hyproduct/Apparatuscombosearch/index"><i class="iconfont icon-moban"></i>器械包模板搜索</a></li>
<!--                                        <li><a href="/Hyproduct/productcomboentity/instrumentpackage"><i class="iconfont icon-qixiebao"></i>新建器械包</a></li>-->
                                        <li><a href="/Hyproduct/productcomboentity/index"><i class="iconfont icon-liebiao"></i>器械包列表</a></li>
                                        <li><a href="/Hyproduct/apparatusallocationrule/index"><i class="iconfont icon-guizeguanli"></i>器械包分配规则</a></li>
<!--                                        <li><a href="/Hyproduct/warehouse/index"><i class="iconfont icon-guizeguanli"></i>仓库管理</a></li>-->
<!--                                        <li><a href="/Hyproduct/supplier/index"><i class="iconfont icon-guizeguanli"></i>供应商</a></li>-->
<!--                                        <li><a href="/Hyproduct/manufacturer/index"><i class="iconfont icon-guizeguanli"></i>生产商列表</a></li>-->
                                    </ul>
                                </span>
                    </li>
                    <li>
                        <div class="header">
                            <a>
                                <i class="iconfont icon-guanli"></i>
                                <span class="label" >清洗锅管理</span>
                                <span class="arrow up"></span>
                            </a>
                        </div>
                                <span class="no">
                                    <ul class="menu" style="display:block;">
                                        <li><a href="/Hyproduct/cleanpot/index"><i class="iconfont icon-jichuxinxi"></i>基础信息</a></li>
                                        <!--<li><a href="#"><i class="iconfont icon-iconlishijilu"></i>历史记录</a></li>-->
                                    </ul>
                                </span>
                    </li>
                    <li>
                        <div class="header">
                            <a>
                                <i class="iconfont icon-guanli"></i>
                                <span class="label" >灭菌锅管理</span>
                                <span class="arrow up"></span>
                            </a>
                        </div>
                                <span class="no">
                                    <ul class="menu" style="display:block;">
                                        <li><a href="/Hyproduct/disinfectpot/index"><i class="iconfont icon-jichuxinxi"></i>基础信息</a></li>
                                        <!--<li><a href="#"><i class="iconfont icon-iconlishijilu"></i>历史记录</a></li>-->
                                    </ul>
                                </span>
                    </li>
                    <li>
                        <div class="header">
                            <a>
                                <i class="iconfont icon-guanli"></i>
                                <span class="label" >敷料包管理</span>
                                <span class="arrow up"></span>
                            </a>
                        </div>
                                <span class="no">
                                    <ul class="menu" style="display:block;">
                                        <li><a href="/Hyproduct/Dressingbagmanager/index"><i class="iconfont icon-jichuxinxi"></i>敷料包维护</a></li>
                                        <!--<li><a href="#"><i class="iconfont icon-iconlishijilu"></i>历史记录</a></li>-->
                                    </ul>
                                </span>
                    </li>
                </ul>
            </div><!--.page-sidebar end---左边列表-->
                <div class="page-content con-matter">
                    @yield('content')
                </div>
            </div>

        </div>
    </div>


    <!-- JavaScripts -->
    <script src="{{ asset('assets/js/jquery2.2.3.min.js') }}" ></script>
    <script src="{{ asset('assets/js/bootstrap3.3.6.min.js') }}" ></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
