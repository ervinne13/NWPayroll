<div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler">
                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>

            <li class="heading">
                <h3 class="uppercase">Navigation</h3>
            </li>

            <li class="start ">
                <a href="{{url('/')}}">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="fa fa-bolt"></i>
                    <span class="title">Quick Actions</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{url('/')}}">
                            <i class="fa fa-book"></i> Create Payroll Item
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/')}}">
                            <i class="fa fa-table"></i> Processed New Payroll
                        </a>
                    </li>                    
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="fa fa-book"></i>
                    <span class="title">Payroll</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{url('/')}}">
                            <i class="fa fa-table"></i> Processed Payrolls
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/')}}">
                            <i class="fa fa-file-o"></i> Policies
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/')}}">
                            <i class="fa fa-book"></i> Payroll Items
                        </a>
                    </li>                    
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="fa fa-file"></i>
                    <span class="title">Master Files</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{url('/')}}">
                            <i class="fa fa-users"></i> Employees
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/')}}">
                            <i class="fa fa-book"></i> Policies
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="fa fa-gear"></i>
                    <span class="title">Setup</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{url('/')}}">
                            <i class="fa fa-building"></i> Companies
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/')}}">
                            <i class="fa fa-map-marker"></i> Locations
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/')}}">
                            <i class="fa fa-plane"></i> Holidays
                        </a>
                    </li>                    
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="fa fa-table"></i>
                    <span class="title">Views/Tables</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{url('/')}}">
                            <i class="fa fa-table"></i> Tax Categories
                        </a>
                    </li>                 
                </ul>
            </li>


        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>