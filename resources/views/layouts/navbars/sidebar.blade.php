<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('assets') }}/img/Tech4all2.png" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="media align-items-center">
                        @if (Auth::user()->profile == '')
                            <span class="avatar avatar-m rounded-circle">
                                <img alt="Image placeholder" src="{{ asset('argon/img/theme/team-4-800x800.jpg') }}">
                            </span>
                        @else
                            <span class="avatar avatar-m rounded-circle">
                                <img alt="Image placeholder" src="{{ asset('assets/img/' . Auth::user()->profile) }}">
                            </span>
                        @endif
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                   <a href="{{ route('myprofile') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <a href="{{ route('change') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('Change Password') }}</span>
                    </a>
                
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets') }}/img/Tech4all2.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                            aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            {{-- <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended"
                        placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form> --}}
            <!-- Navigation -->
            <ul class="navbar-nav">
                @if (Auth::user()->role_as == 1 || Auth::user()->role_as == 2)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('studashboard') }}">
                            <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                        </a>
                    </li>
                @endif
                @if (Auth::user()->role_as == 2)
                    <li class="nav-item">
                        <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="navbar-examples">
                            <i class="ni ni-circle-08 text-pink" style="color: #f4645f;"></i>
                            <span class="nav-link-text" style="color: #f4645f;">{{ __('Employees') }}</span>
                        </a>

                        <div class="collapse show" id="navbar-examples">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('employ') }}">
                                        {{ __('Add Employee') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('showemploy') }}">
                                        {{ __('View Employee') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                @if (Auth::user()->role_as == 2 || Auth::user()->role_as == 0)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('getpost') }}">
                            <i class="ni ni-planet text-blue"></i> {{ __('Posts') }}
                        </a>
                    </li>
                @endif
                @if (Auth::user()->role_as == 0)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('gettask') }}">
                            <i class="ni ni-planet text-blue"></i> {{ __('Tasks') }}
                        </a>
                    </li>
                @endif
                 @if (Auth::user()->role_as == 0)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('updtrack') }}">
                            <i class="ni ni-planet text-blue"></i> {{ __('Change Track') }}
                        </a>
                    </li>
                @endif
                 @if (Auth::user()->role_as == 0)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('updcourse') }}">
                            <i class="ni ni-planet text-blue"></i> {{ __('Change Course') }}
                        </a>
                    </li>
                @endif
 
                @if (Auth::user()->role_as == 2)
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('getusers') }}">
                            <i class="ni ni-circle-08 text-pink"></i> {{ __('Users') }}
                        </a>
                    </li>
                @endif

                @if (Auth::user()->role_as == 2)
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('alltask') }}">
                            <i class="ni ni-pin-3 text-orange"></i> {{ __('All Tasks') }}
                        </a>
                    </li>
                @endif

                @if (Auth::user()->role_as == 2)
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('allsubtask') }}">
                            <i class="ni ni-pin-3 text-orange"></i> {{ __('All Submitted Tasks') }}
                        </a>
                    </li>
                @endif


                @if (Auth::user()->role_as == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tasks') }}">
                            <i class="ni ni-pin-3 text-orange"></i>
                            <span class="nav-link-text">Create Task</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->role_as == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('showtask') }}">
                            <i class="ni ni-pin-3 text-orange"></i>
                            <span class="nav-link-text">Tasks</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->role_as == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('submitted') }}">
                            <i class="ni ni-pin-3 text-orange"></i>
                            <span class="nav-link-text">Submitted Tasks</span>
                        </a>
                    </li>
                @endif


                 @if (Auth::user()->role_as == 1 || Auth::user()->role_as == 2)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts') }}">
                            <i class="ni ni-pin-3 text-orange"></i>
                            <span class="nav-link-text">Create Post</span>
                        </a>
                    </li>
                @endif

                 @if (Auth::user()->role_as == 1 || Auth::user()->role_as == 2)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('showpost') }}">
                            <i class="ni ni-pin-3 text-orange"></i>
                            <span class="nav-link-text">Show Post</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->role_as == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('employee_student') }}">
                            <i class="ni ni-pin-3 text-orange"></i>
                            <span class="nav-link-text">Student</span>
                        </a>
                    </li>
                @endif

            </ul>
            <!-- Divider -->
            {{-- <hr class="my-3"> --}}
            <!-- Heading -->
            {{-- <h6 class="navbar-heading text-muted">Documentation</h6> --}}
            <!-- Navigation -->

        </div>
    </div>
</nav>
