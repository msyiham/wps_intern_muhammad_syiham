    <div id="header" class="app-header">
        <!-- BEGIN mobile-toggler -->
        <div class="mobile-toggler">
            <button type="button" class="menu-toggler" data-toggle="sidebar-mobile">
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
        </div>
        <!-- END mobile-toggler -->
        
        <!-- BEGIN brand -->
        <div class="brand">
            <div class="desktop-toggler">
                <button type="button" class="menu-toggler" data-toggle="sidebar-minify">
                    <span class="bar"></span>
                    <span class="bar"></span>
                </button>
            </div>
            
            <a href="" class="brand-logo">
                <img src="{{URL::to('/') }}/src/img/logo.png" class="invert-dark" alt="" height="20">
            </a>
        </div>
        <!-- END brand -->
        
        <!-- BEGIN menu -->
        <div class="menu">
            @auth                
            <form class="menu-search" method="POST" name="header_search_form">
                <div class="menu-search-icon"><i class="fa fa-search"></i></div>
                <div class="menu-search-input">
                    <input type="text" class="form-control" placeholder="Search menu...">
                </div>
            </form>
            <div class="menu-item dropdown">
                <a href="#" data-bs-toggle="dropdown" data-display="static" class="menu-link">
                    <div class="menu-text">{{ Auth::user()->email }}</div>
                </a>
                <div class="dropdown-menu dropdown-menu-end me-lg-3">
                    <a class="dropdown-item d-flex align-items-center" href="{{route('profile.edit')}}">Edit Profile <i class="fa fa-user-circle fa-fw ms-auto text-body text-opacity-50"></i></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form-desktop').submit();">
                    Logout
                        <i class="fa fa-sign-out-alt fa-fw ms-auto text-body text-opacity-50"></i>
                    </a>
                    <form id="logout-form-desktop" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            @endauth
        </div>
        <!-- END menu -->
    </div>
    <!-- END #header -->
    
    <!-- BEGIN #sidebar -->
    <div id="sidebar" class="app-sidebar">
        <!-- BEGIN scrollbar -->
        <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
            <!-- BEGIN menu -->
            <div class="menu">
                @guest
                <div class="menu-header text-danger">Akses Terbatas</div>
                <div class="menu-item">
                    <a href="{{ route('login') }}" class="menu-link">
                        <span class="menu-icon"><i class="fa fa-lock"></i></span>
                        <span class="menu-text">Silakan login untuk mengakses fitur-fitur keren kami!</span>
                    </a>
                </div>
                @endguest
                
                @auth
                <div class="menu-header">Navigation</div>
                {{-- Dashboard untuk semua role --}}
                <div class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
                    <a href="{{route('dashboard')}}" class="menu-link">
                        <span class="menu-icon"><i class="fa fa-laptop"></i></span>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </div>                
                <div class="menu-divider"></div>
                <div class="menu-header">Main Menu</div>
                {{-- Hanya untuk admin --}}
                @role('admin')
                <div class="menu-item {{ request()->is('admin/create-user') ? 'active' : '' }}">
                    <a href="{{route('admin.create-user')}}" class="menu-link">
                        <span class="menu-icon"><i class="fa fa-users"></i></span>
                        <span class="menu-text">Tambahkan Direktur & Manager</span>
                    </a>
                </div>
                <div class="menu-item {{ request()->is('admin/create-user') ? 'active' : '' }}">
                    <a href="{{route('admin.staff-manager.index')}}" class="menu-link">
                        <span class="menu-icon"><i class="fa fa-handshake"></i></span>
                        <span class="menu-text">Kelola Staff</span>
                    </a>
                </div>
                @endrole
                {{-- Hanya untuk director dan manager --}}
                @hasanyrole('|manager|staff')
                <div class="menu-item {{ request()->is('widgets') ? 'active' : '' }}">
                    <a href="{{route('user.daily-note.create')}}" class="menu-link">
                        <span class="menu-icon"><i class="fa fa-share-square"></i></span>
                        <span class="menu-text">Upload Catatan Harian</span>
                    </a>
                </div>
                <div class="menu-item {{ request()->is('widgets') ? 'active' : '' }}">
                    <a href="{{route('user.daily-note.index')}}" class="menu-link">
                        <span class="menu-icon"><i class="fa fa-clipboard"></i></span>
                        <span class="menu-text">Catatan Harian Anda</span>
                    </a>
                </div>
                @endhasanyrole
                @hasanyrole('director|manager')
                <div class="menu-item {{ request()->is('widgets') ? 'active' : '' }}">
                    <a href="{{route('user.daily-note.review')}}" class="menu-link">
                        <span class="menu-icon"><i class="fa fa-address-card"></i></span>
                        <span class="menu-text">Cek Aktivitas Bawahan</span>
                    </a>
                </div>
                @endhasanyrole            
            @endauth            
            </div>
            <!-- END menu -->
        </div>
        <!-- END scrollbar -->
        
        <!-- BEGIN mobile-sidebar-backdrop -->
        <button class="app-sidebar-mobile-backdrop" data-dismiss="sidebar-mobile"></button>
        <!-- END mobile-sidebar-backdrop -->
    </div>
    <!-- END #sidebar -->
    
    <!-- BEGIN #content -->

    <!-- END #content -->
    
    <!-- BEGIN btn-scroll-top -->
    <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
    <!-- END btn-scroll-top -->
    <!-- BEGIN theme-panel -->
    <div class="theme-panel">
        <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
        <div class="theme-panel-content">
            <ul class="theme-list clearfix">
                <li><a href="javascript:;" class="bg-red" data-theme="theme-red" data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Red" data-original-title="" title="">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-pink" data-theme="theme-pink" data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Pink" data-original-title="" title="">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-orange" data-theme="theme-orange" data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Orange" data-original-title="" title="">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-yellow" data-theme="theme-yellow" data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Yellow" data-original-title="" title="">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-lime" data-theme="theme-lime" data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Lime" data-original-title="" title="">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-green" data-theme="theme-green" data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Green" data-original-title="" title="">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-teal" data-theme="theme-teal" data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Teal" data-original-title="" title="">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-cyan" data-theme="theme-cyan" data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Aqua" data-original-title="" title="">&nbsp;</a></li>
                <li class="active"><a href="javascript:;" class="bg-blue" data-theme="" data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Default" data-original-title="" title="">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-purple" data-theme="theme-purple" data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Purple" data-original-title="" title="">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-indigo" data-theme="theme-indigo" data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Indigo" data-original-title="" title="">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-gray-600" data-theme="theme-gray-600" data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Gray" data-original-title="" title="">&nbsp;</a></li>
            </ul>
            <hr class="mb-0">
            <div class="row mt-10px pt-3px">
                <div class="col-9 control-label text-body-emphasis fw-bold">
                    <div>Dark Mode <span class="badge bg-theme text-theme-color ms-1 position-relative py-4px px-6px" style="top: -1px">NEW</span></div>
                    <div class="lh-sm fs-13px fw-semibold">
                        <small class="text-body-emphasis opacity-50">
                            Adjust the appearance to reduce glare and give your eyes a break.
                        </small>
                    </div>
                </div>
                <div class="col-3 d-flex">
                    <div class="form-check form-switch ms-auto mb-0 mt-2px">
                        <input type="checkbox" class="form-check-input" name="app-theme-dark-mode" id="appThemeDarkMode" value="1">
                        <label class="form-check-label" for="appThemeDarkMode">&nbsp;</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END theme-panel -->