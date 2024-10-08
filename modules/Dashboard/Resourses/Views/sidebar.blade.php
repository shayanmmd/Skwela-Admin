{{$media = Media\Http\Models\Media::where('id', '=', Auth::user()->media_id)->first()}}



<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home-page')}}" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Skwela Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if ($media)
                <img src="{{url('storage/' . $media->name . '.' . $media->extension)}}" class="img-circle elevation-2" alt="User Image">
                @else
                <img src="dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
                @endif

            </div>
            <div class="info">
                <a href="{{route('profile-page')}}" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('home-page')}}" class="nav-link">
                                <i class="fa fa-home nav-icon"></i>
                                <p>Home</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('navlinks-page')}}" class="nav-link">
                                <i class="fa fa-list nav-icon"></i>
                                <p>NavLinks</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('role-permission-page')}}" class="nav-link">
                                <i class="fas fa-address-card nav-icon"></i>
                                <p>Roles And Permissions</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('courses-page')}}" class="nav-link">
                                <i class="fa fa-book nav-icon"></i>
                                <p>Courses</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('contact-page')}}" class="nav-link">
                                <i class="fa fa-phone nav-icon"></i>
                                <p>Contact</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">

                    <a href="#" class="nav-link">
                        <i class="fa fa-print nav-icon"></i>
                        <p>Blogs</p>
                    </a>
                    
                    <ul class="nav nav-treeview">
                        <li class="nav-iten">
                            <a href="{{route('create-blog')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add</p>
                            </a>

                        </li>
                    </ul>
                </li>

                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('profile-page')}}" class="nav-link">
                                <i class="fa fa-user nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
        </nav>
    </div>


</aside>