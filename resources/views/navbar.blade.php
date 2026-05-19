   <div class="narbar" data-aos="fade-down" data-aos-duration="2000">
    <nav class="navbar navbar-expand-md navbar-light mb-5">
          <a class="navbar-brand" href="#">
            <img src="{{url('aset/img/logo RSUD.png')}}" alt="" width="190" height="51" class="d-inline-block align-text-top">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
              @auth
                <ul class="navbar-nav me-0 mb-2 mb-md-0 mx-auto">
                    {{-- <ul class="navbar-nav me-0 ms-auto"> --}}
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <h5 class="badge rounded-pill bg-success p-2">Hello, {{ auth()->user()->name }}</h5>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown"> 
                      <li>
                      <a class="dropdown-item" href="{{ route('profileedit') }}">Profile</a>
                    </li>
                      <li>
                        <form action="/logout" method="POST">
                          @csrf
                          <button type="submit" class="dropdown-item">Log Out <i class="fa-solid fa-right-from-bracket"></i></button>
                        </form>
                        
                      </li>
                    </ul>
                  </li>
                  {{-- </ul> --}}
                </ul>
                @else
                <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
              <ul class="navbar-nav ms-auto">
                {{-- <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#home">Branda</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#s&k">Syarat & Ketentuan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#alur">Alur Pengajuan</a>
                </li>                             --}}
                @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
              </ul>
              <ul class="navbar-nav me-0 mb-2 mb-md-0 mx-auto">
                <a href="/login"class="btn btn-info text-white tombol">Masuk<i class="fa-solid fa-right-to-bracket ms-2"></i></a>
              </ul>
            </div>
              @endauth
            
          </div>
      </nav>
    </div>
