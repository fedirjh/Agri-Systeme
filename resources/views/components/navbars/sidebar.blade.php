<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href=" {{ route('dashboard') }} ">
                <img src="{{ asset('assets') }}/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-2 font-weight-bold text-white">Material Dashboard 2 Laravel Livewire</span>
            </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'dashboard' ? ' active bg-gradient-primary' : '' }} "
                   href="{{ route('dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">home</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Agronomic</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'agriculteurs' ? ' active bg-gradient-primary' : '' }} "
                   href="{{ route('agriculteurs') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-tractor text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Agriculteurs</span>
                </a>
            </li>

            <a class="nav-link text-white {{ Route::currentRouteName() == 'responsables' ? ' active bg-gradient-primary' : '' }} "
               href="{{ route('responsables') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1rem;" class="fas fa-users text-center"></i>
                </div>
                <span class="nav-link-text ms-1">Responsables</span>
            </a>

            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'rapports' ? ' active bg-gradient-primary' : '' }} "
                   href="{{ route('rapports') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Rapports</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Logistics</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'transporteurs' ? ' active bg-gradient-primary' : '' }} "
                   href="{{ route('transporteurs') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-truck text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Transporteurs</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'bennes' ? ' active bg-gradient-primary' : '' }} "
                   href="{{ route('bennes') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-building text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Bennes</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Stock</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'entities' ? ' active bg-gradient-primary' : '' }} "
                   href="{{ route('entities') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Entities</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'livraisons' ? ' active bg-gradient-primary' : '' }} "
                   href="{{ route('livraisons') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">assignment</i>
                    </div>
                    <span class="nav-link-text ms-1">Livraisons</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Management</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'admins' ? ' active bg-gradient-primary' : '' }} "
                   href="{{ route('admins') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-user text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Admins</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'roles' ? ' active bg-gradient-primary' : '' }} "
                   href="{{ route('roles') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-lock text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Roles</span>
                </a>
            </li>

<!--            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'user-profile' ? ' active bg-gradient-primary' : '' }} "
                   href="{{ route('user-profile') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-user-circle ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'user-management' ? ' active bg-gradient-primary' : '' }} "
                   href="{{ route('user-management') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Management</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'tables' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('tables') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Tables</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'billing' ? ' active bg-gradient-primary' : '' }}  "
                    href="{{ route('billing') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                    <span class="nav-link-text ms-1">Billing</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'profile' ? ' active bg-gradient-primary' : '' }}  "
                    href="{{ route('profile') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('static-sign-in') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">login</i>
                    </div>
                    <span class="nav-link-text ms-1">Sign In</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('static-sign-up') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">assignment</i>
                    </div>
                    <span class="nav-link-text ms-1">Sign Up</span>
                </a>
            </li>-->
        </ul>
    </div>

</aside>
