<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--<title>{{ config('app.name', 'Laravel') }}</title>--}}

    <title>งานสารสนเทศ รพ.แม่วาง</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Branding Image -->
                    @if(Auth::check())
                        <a class="navbar-brand" href="{{ url('/home') }}">
                            งานสารสนเทศ รพ.แม่วาง
                        </a>
                    @else
                        <a class="navbar-brand" href="{{ url('/') }}">
                            งานสารสนเทศ รพ.แม่วาง
                        </a>
                    @endif
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @if(Auth::check())
                        &nbsp;<li class="nav-item @if($mainmenu=="activity") active @endif">
                            <a class="nav-link " href="{{route('activity')}}">บันทึกการปฏิบัติงาน</a>
                        </li>
                         <li class="nav-item @if($mainmenu=="dataDevice") active @endif">
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ข้อมูลครุภัณฑ์<span class="caret"></span></a>
                             <ul class="dropdown-menu">
                                 <li><a href="{{route('dataDevice')}}">ข้อมูลครุภัณฑ์</a></li>
                                 <li><a href="{{route('sendDevice')}}">ข้อมูลการส่งซ่อมครุภัณฑ์</a></li>
                                 <li><a href="{{route('dataDevice.selling')}}">ข้อมูลครุภัณฑ์ที่ถูกจำหน่าย</a></li>
                             </ul>
                        </li>
                        <li class="nav-item @if($mainmenu=="group") active @endif">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">จัดการข้อมูล<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('group')}}">หน่วยงาน</a></li>
                                <li><a href="{{route('device')}}">อุปกรณ์</a></li>
                            </ul>
                        </li>
                        <li class="nav-item @if($mainmenu=="sendData") active @endif">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">การส่งข้อมูล<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('send.data')}}">การส่งข้อมูล 12 แฟ้ม</a></li>
                                <li><a href="{{route('send.fortyThreeFileCM')}}">การส่งข้อมูล 43 แฟ้ม จังหวัดเชียงใหม่</a></li>
                                <li><a href="{{route('send.fortyThreeFileNHSO')}}">การส่งข้อมูล 43 แฟ้ม สปสช.</a></li>
                            </ul>
                        </li>
                        <li class="nav-item @if($mainmenu=="report") active @endif">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">รายงาน<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('report')}}">ข้อมูลบันทึกการปฏิบัติงาน</a></li>
                                <li><a href="{{route('report.group')}}">ข้อมูลหน่วยงาน</a></li>
                            </ul>
                        </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ url('/home') }}">เข้าสู่ระบบ</a></li>
                            <li><a href="{{ route('sendProblems') }}">แจ้งปัญหา</a></li>
                            <li><a href="{{ route('register') }}">ลงทะเบียน</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('register') }}">
                                            ลงทะเบียนผู้ใช้งาน
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            ออกจากระบบ
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
