<div class="global-navbar bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-3 d-none d-sm-none d-md-inline">
                <img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="w-100">
            </div>
            <div class="col-md-9 my-auto">
                <div class="border text-center p-2">
                    <h5>Advertise Here</h5>
                </div>
            </div>
        </div>
    </div>
  </div>
  <div class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-nav">

        <div class="container">

          <a href="" class="navbar-brand d-inline d-sm-inline d-md-none">
            <img src="{{ asset('assets/images/logo.png') }}" alt="logo" style="width: 140px">
          </a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">Home</a>
              </li>
                    @php
                    $categories = App\Models\Category::where('navbar_status','0')->where('status','0')->get();
                    @endphp
                @foreach ($categories as $item)
                    <li class="nav-item">
                        <a href="{{ url('tutorial/'.$item->slug) }}" class="nav-link">{{ $item->name }}</a>    
                    </li>
                @endforeach
                @if (Auth::check())
                <a href="{{ url('admin/dashboard') }}" class="nav-link btn-success">
                  Dashboard
                </a>
                @endif
                
                @if (Auth::check())
                <li>
                  <a href="{{ route('logout') }}" class="nav-link btn-danger"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                    Logout
                  </a>
                  <form action="{{ route('logout') }}" id="logout-form" method="POST" class="d-none">
                    @csrf
                  </form>
                </li>
                @else
                <a href="{{ url('/login') }}" class="nav-link btn-success">
                  Login
                </a>
                <a href="{{ url('/register') }}" class="nav-link btn-success">
                  Register
                </a>
              </li>  
                @endif
            </ul>
          </div>
        </div>

      </nav>
  </div>
