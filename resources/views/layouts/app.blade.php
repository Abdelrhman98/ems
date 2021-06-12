<!doctype html >
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('img/front/favicon.png') }}" type="image/gif" sizes="16x16">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.js') }}" ></script>
    <script src="{{ asset('js/select2.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('DataTables/js/jquery.dataTables.min.js') }}"></script>
    <!-- Latest compiled and minified CSS -->

    <!-- Styles -->

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/css/jquery.dataTables.min.css') }}"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>

      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = true;

      var pusher = new Pusher('ca0be4859e546db61648', {
        cluster: 'eu'
      });

      var channel = pusher.subscribe('my-channel');
      channel.bind('my-event', function(data) {
       vaJSON.stringify(data);
      });
    </script>-->
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ url('/') }}"> منظومة إدارة المعدات</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                @auth
                <li class="nav-item ">
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      لوحة التحكم
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ url('register') }}"> إنشاء حساب</a>
                      <a class="dropdown-item" href="{{ url('permissions') }}">الصلاحيات</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#"></a>
                    </div>
                </li>


                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    المعدات
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('equipments/create') }}">إضافة معدة حالية</a>
                    <a class="dropdown-item" href="{{ url('equipments/show') }}"> تقرير حصر المعدات</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">تصنيع معدة جديدة</a>
                    <a class="dropdown-item" href="#">تقرير بمعدات تحت التصنيع</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"> معدات تم انهاء التعاقد / البيع</a>


                  </div>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('logout') }}"> تسجيل الخروج</a>
                </li>

                @endauth
                @guest

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('login') }}"> تسجيل الدخول </a>
                </li>


             @endguest

            </ul>
            </div>
          </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Latest compiled and minified JavaScript -->



</body>
</html>
