<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('/images/user.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            @if(auth()->user()->isAdmin())
                <li class="active"><a href="/category"><i class="fa fa-server"></i> <span>Categories</span></a></li>
            @endif

            @if(auth()->user()->isAdmin() || auth()->user()->isEmployer())
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-black-tie"></i> <span>Employer</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/jobs/create">Post a job</a></li>
                        <li><a href="/posted">Posted Jobs</a></li>
                        <li><a href="/profile/{{ auth()->id() }}">Profile</a></li>
                    </ul>
                </li>
            @endif

            <li><a href="/profile/{{ auth()->id() }}"><i class="fa fa-user"></i><span>Profile</span></a></li>

            @if(auth()->user()->isAdmin())
                <li><a href="/users"><i class="fa fa-users"></i> <span>Users</span></a></li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i> <span>Jobs</span>
                        <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="/admin/jobs/pending">
                                <span>Pending</span>
                                <span class="pull-right-container">
                                <small class="label pull-right bg-blue">{{ $pending }}</small>
                            </span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/jobs/approved">
                                <span>Approved </span>
                                <span class="pull-right-container">
                                <small class="label pull-right bg-green">{{ $approved }}</small>
                            </span>
                            </a>
                        </li>
                        <li><a href="/admin/jobs/blocked">
                                <span>Blocked </span>
                                <span class="pull-right-container">
                                <small class="label pull-right bg-red">{{ $blocked }}</small>
                            </span>
                            </a>
                        </li>
                    </ul>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>CMS</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu" style="">
                        <li class=""><a href="/pages"><i class="fa fa-circle-o"></i> Pages</a>
                        </li>
                        <li><a href="/posts"><i class="fa fa-circle-o"></i> Posts</a></li>
                    </ul>
                </li>

                </li>
            @endif
            <li>
                <a href="/change-password/{{ auth()->user()->id }}">
                    <i class="fa fa-lock"></i>
                    <span>Change Password</span>
                </a>
            </li>

        </ul>

        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>