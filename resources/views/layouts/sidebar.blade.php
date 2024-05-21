            <div class="left side-menu" style="background-color: #738999;">
                <div class="slimscroll-menu">

                    <div id="sidebar-menu" >
                        
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">ADMIN</li>
                            <li class="">
                                <a href="{{route('admin')}}" class="waves-effect {{ request()->is("admin") || request()->is("admin/*") ? "mm active" : "" }}">
                                    <i class="ti-home"></i> <span> Dashboard </span>
                                </a>
                            </li>
                            

                            <li>
                                <a href="/employees" class="waves-effect {{ request()->is("employees") || request()->is("/employees/*") ? "mm active" : "" }}"><i class="ti-user"></i><span> Employees </span></a>
                            </li>

                            <li class="">
                                <a href="/schedule" class="waves-effect {{ request()->is("schedule") || request()->is("schedule/*") ? "mm active" : "" }}">
                                    <i class="ti-time"></i> <span> Schedule </span>
                                </a>
                            </li>
                            <li class="menu-title">MANAGEMENT</li>

                            <!-- <li class="">
                                <a href="/check" class="waves-effect {{ request()->is("check") || request()->is("check/*") ? "mm active" : "" }}">
                                    <i class="dripicons-to-do"></i> <span> Attendance Sheet </span>
                                </a>
                            </li> -->
                            <li class="">
                                <a href="/attendance" class="waves-effect {{ request()->is("attendance") || request()->is("attendance/*") ? "mm active" : "" }}">
                                    <i class="ti-calendar"></i> <span> Attendance Logs </span>
                                </a>
                            </li>
                            <li class="">
                                <a href="/sheet-report" class="waves-effect {{ request()->is("sheet-report") || request()->is("sheet-report/*") ? "mm active" : "" }}">
                                    <i class="dripicons-to-do"></i> <span> Sheet Report </span>
                                </a>
                            </li>
                            <li class="">
                                <a href="/leave" class="waves-effect {{ request()->is("leave") || request()->is("leave/*") ? "mm active" : "" }}">
                                    <i class="dripicons-backspace"></i> <span> Leave </span>
                                </a>
                            </li> 
                        </ul>
                    </div>
                    <div class="clearfix"></div>

                </div>

            </div>
