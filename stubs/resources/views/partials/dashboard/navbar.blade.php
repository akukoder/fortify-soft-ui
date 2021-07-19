<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            @yield('breadcrumbs')
            @yield('title')
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
                    <span class="input-group-text text-body">
                        <i class="fas fa-search" aria-hidden="true"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="{{ __('Search here...') }}">
                </div>
            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item dropdown pe-2 d-flex align-items-center ps-3">
                    <a href="javascript:;" class="nav-link text-body p-0" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user cursor-pointer me-2"></i>
                        <span class="d-none d-md-inline-block">
                            {{ auth()->user()->name }}
                        </span>
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="userMenu">
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="{{ route('profile') }}">
                                {{ __('Profile') }}
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item border-radius-md" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

