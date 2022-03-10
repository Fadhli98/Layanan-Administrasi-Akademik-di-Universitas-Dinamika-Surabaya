
<div class="wrapper">
<nav class="main-header navbar navbar-expand-md navbar-primary navbar-dark">
    <div class="container">
      <a href="{{url('/aak')}}" class="navbar-brand">
       <!-- <img src="{{asset('dist/img/user.png')}}" class="brand-image img-circle elevation-3"
             style="opacity: .8"-->
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="{{url('/aak')}}" class="nav-link">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu2" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Layanan</a>
            <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
              <li><a href="{{url('/detdispen')}}" class="dropdown-item">Dispensasi </a></li>
              <li><a href="{{url('/detyudi')}}" class="dropdown-item">Yudisium</a></li>
               <li><a href="{{url('/detcuti')}}" class="dropdown-item">Cuti/BSS</a></li>
              <li><a href="{{url('/detbst')}}" class="dropdown-item">BST</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Detail Dashboard</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="{{url('/dashdispen')}}" class="dropdown-item">Dispensasi </a></li>
              <li><a href="{{url('/dashyudi')}}" class="dropdown-item">Yudisium</a></li>
              <li><a href="{{url('/dashcuti')}}" class="dropdown-item">Cuti/BSS</a></li>
              <li><a href="{{url('/dashbst')}}" class="dropdown-item">BST</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Laporan</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="{{url('/dokdispen')}}" class="dropdown-item">Dispensasi </a></li>
              <li><a href="{{url('/dokyudi')}}" class="dropdown-item">Yudisium</a></li>
              <li><a href="{{url('/dokcuti')}}" class="dropdown-item">Cuti/BSS</a></li>
              <li><a href="{{url('/dokbst')}}" class="dropdown-item">BST</a></li>
            </ul>
          </li>
          <li class="nav-item">
          <a href="{{url('/setting')}}" aria-haspopup="true" aria-expanded="false" class="nav-link">Setting</a>
      </li>

        </ul>

       
        <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                       <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->nama }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
      </div>

    </div>
  </nav>

            @yield('content')