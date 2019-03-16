<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">
                    <i class="fa fa-user-circle img-circle elevation-1"></i>
                     {{session('user')}}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link">
                        <i class="nav-icon fa fa-th"></i>
                        <p>
                            Contacts to vcard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/upload" class="nav-link">
                        <i class="nav-icon fa fa-th"></i>
                        <p>
                            extract data from source
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- /.control-sidebar -->
