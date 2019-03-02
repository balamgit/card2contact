<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <i class="fa fa-user-circle fa-lg"></i>
            </div>
            <div class="pull-left info">
                <p>{{session('user')}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="/dashboard">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>

            <li><a href="/bill/create"><i class="fa fa-circle-o text-red"></i> <span>Bill</span></a></li>
            <li><a href="/reports"><i class="fa fa-circle-o text-yellow"></i> <span>Reports</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>