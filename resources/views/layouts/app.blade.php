<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Scripts -->
  {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <!-- Styles -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/now-ui-kit.min.css') }}" rel="stylesheet">
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/solid.min.css" type="text/css"> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/fontawesome.min.css" type="text/css">
</head>
<body>
<div id="app">

  <!-- navbar -->
  <nav class="navbar navbar-expand-md navbar-light sticky-top bg-primary">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('avatar/logo.png') }}" alt="">
      </a>
      <button 
        class="navbar-toggler navbar-toggler-icon" 
        data-toggle="collapse" 
        data-target="#navbarSupportedContent">
        {{-- <span class="navbar-toggler-icon"></span> --}}
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" 
                 href="{{ route('employer.register') }}">{{ __('Employer Register') }}
              </a>
            </li>
            @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" 
                   href="{{ route('register') }}">{{ __('Job Seeker Register') }}
                </a>
              </li>
            @endif
          @else
            <li>
              <a href="{{ route('job.create') }}">
                <button class="btn btn-primary">Post a Job</button>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a id="navbarDropdown" 
                 class="nav-link dropdown-toggle" 
                 href="#" role="button" 
                 data-toggle="dropdown" aria-haspopup="true" 
                 aria-expanded="false" v-pre>
                 @if(Auth::user()->user_type == 'employer')
                  {{ Auth::user()->company->cname }} 
                  <span class="caret"></span>
                 @else
                  {{ Auth::user()->name }} 
                  <span class="caret"></span>
                 @endif
              </a>

              <div class="dropdown-menu dropdown-menu-right" 
                   aria-labelledby="navbarDropdown">
                @if(Auth::user()->user_type == 'employer')
                  <a class="dropdown-item" 
                     href="{{ route('company.view') }}">
                    {{ __('Company') }}
                  </a>
                  <a class="dropdown-item" 
                     href="{{ route('job.myjob') }}">My Jobs
                  </a>
                  <a class="dropdown-item" 
                     href="{{ route('applicant') }}">My Applicants
                  </a>
                @else
                  <a class="dropdown-item" 
                     href="user/profile">{{ __('Profile') }}
                  </a>
                  <a class="dropdown-item" 
                     href="{{ route('home') }}">{{ __('Saved Jobs') }}
                  </a>
                @endif
                <a class="dropdown-item" 
                   href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>

                <form id="logout-form" 
                      action="{{ route('logout') }}" 
                      method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>

  <main class="py-4">
  @yield('content')
  </main>

</div>
  {{-- end of app div --}}
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
