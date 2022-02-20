<form class="form-inline mr-auto" action="#">
    <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
</form>
<ul class="navbar-nav navbar-right">

    @if(\Illuminate\Support\Facades\Auth::user())
    <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link nav-link-lg nav-link-user" >

            <div class="d-sm-none d-lg-inline-block" style="padding-right: 740px">
                Hola, {{\Illuminate\Support\Facades\Auth::user()->name}}</div>
        </a>

        <div class="dropdown-menu dropdown-menu-botton">
            <div class="dropdown-title">
                Welcome, {{\Illuminate\Support\Facades\Auth::user()->name}}</div>
            <a class="dropdown-item has-icon edit-profile" href="#" data-id="{{ \Auth::id() }}">
                <i class="fa fa-user"></i>Edit Profile</a>
            <a class="dropdown-item has-icon" data-toggle="modal" data-target="#changePasswordModal" href="#" data-id="{{ \Auth::id() }}"><i class="fa fa-lock"> </i>Change Password</a>
        </div>

    </li>
    <li>
        <a style="color: black" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Cerrar sesion') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
    <li>
        <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
        </label>
    </li>
    @else
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            {{-- <img alt="image" src="#" class="rounded-circle mr-1">--}}
            <div class="d-sm-none d-lg-inline-block">{{ __('messages.common.hello') }}</div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title">{{ __('messages.common.login') }}
                / {{ __('messages.common.register') }}</div>
            <a href="{{ route('login') }}" class="dropdown-item has-icon">
                <i class="fas fa-sign-in-alt"></i> {{ __('messages.common.login') }}
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('register') }}" class="dropdown-item has-icon">
                <i class="fas fa-user-plus"></i> {{ __('messages.common.register') }}
            </a>
        </div>
    </li>
    @endif
</ul>
