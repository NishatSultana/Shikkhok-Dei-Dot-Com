<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar-->
    <section class="sidebar">
        <div id="menu" role="navigation">
            <ul class="navigation">
                <li class="active" id="active">
                    <a href="{{url('/dashboard')}}">
                        <i class="menu-icon ti-desktop"></i>
                        <span class="mm-text ">Dashboard</span>
                    </a>
                </li>
                @if( $templateUser->is_system_user || in_array('view_groups', $templatePermissions) ||  in_array('add_groups', $templatePermissions) )
                    <li class="menu-dropdown">
                        <a href="#">
                            <i class="fa fa-users"></i>
                            <span>Groups</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            @if( $templateUser->is_system_user || in_array('view_groups', $templatePermissions))
                                <li>
                                    <a href="{{ url('groups') }}">
                                        <i class="fa fa-list-ul"></i>
                                        Group List
                                    </a>
                                </li>
                            @endif
                            @if( $templateUser->is_system_user || in_array('add_groups', $templatePermissions))
                                <li>
                                    <a href="{{ url('groups/create') }}">
                                        <i class="fa fa-plus-square-o"></i>
                                        Add Group
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if( $templateUser->is_system_user || in_array('view_modules', $templatePermissions) ||  in_array('add_modules', $templatePermissions) )
                    <li class="menu-dropdown">
                        <a href="#">
                            <i class="fa fa-cogs"></i>
                            <span>Modules</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            @if( $templateUser->is_system_user || in_array('view_modules', $templatePermissions))
                                <li>
                                    <a href="{{ url('modules') }}">
                                        <i class="fa fa-list-ul"></i>
                                        Module List
                                    </a>
                                </li>
                            @endif
                            @if( $templateUser->is_system_user || in_array('add_modules', $templatePermissions))
                                <li>
                                    <a href="{{ url('modules/create') }}">
                                        <i class="fa fa-plus-square-o"></i>
                                        Add Module
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if( $templateUser->is_system_user || in_array('view_permissions', $templatePermissions) ||  in_array('add_permissions', $templatePermissions) )
                    <li class="menu-dropdown">
                        <a href="#">
                            <i class="fa fa-eye-slash"></i>
                            <span>Permissions</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            @if( $templateUser->is_system_user || in_array('view_permissions', $templatePermissions))
                                <li>
                                    <a href="{{ url('permissions') }}">
                                        <i class="fa fa-list-ul"></i>
                                        Permission List
                                    </a>
                                </li>
                            @endif
                            @if( $templateUser->is_system_user || in_array('add_permissions', $templatePermissions))
                                <li>
                                    <a href="{{ url('permissions/create') }}">
                                        <i class="fa fa-plus-square-o"></i>
                                        Add Permission
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if( $templateUser->is_system_user || in_array('view_users', $templatePermissions) ||  in_array('view_students_guardian', $templatePermissions) ||  in_array('view_office_users', $templatePermissions)||  in_array('add_users', $templatePermissions) )
                    <li class="menu-dropdown">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>Users</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            @if( $templateUser->is_system_user || in_array('view_users', $templatePermissions))
                                <li>
                                    <a href="{{ url('users') }}">
                                        <i class="fa fa-list-ul"></i>
                                        Tutors List
                                    </a>
                                </li>
                            @endif
                            @if( $templateUser->is_system_user || in_array('view_students_guardian', $templatePermissions))
                                <li>
                                    <a href="{{ url('users/students-guardian') }}">
                                        <i class="fa fa-list-ul"></i>
                                        Student/Guardian List
                                    </a>
                                </li>
                            @endif
                            @if( $templateUser->is_system_user || in_array('view_office_users', $templatePermissions))
                                <li>
                                    <a href="{{ url('users/office') }}">
                                        <i class="fa fa-list-ul"></i>
                                        Office Employees List
                                    </a>
                                </li>
                            @endif
                            @if( $templateUser->is_system_user || in_array('add_users', $templatePermissions))
                                <li>
                                    <a href="{{ url('users/create') }}">
                                        <i class="fa fa-plus-square-o"></i>
                                        Add Office Employees
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if( $templateUser->is_system_user || in_array('add_jobs', $templatePermissions) )
                    <li class="menu-dropdown">
                        <a href="{{url('/post-job')}}">
                            <i class="fa fa-user-md"></i>
                            <span>Tutor Request</span>
                        </a>
                    </li>
                @endif
                @if( $templateUser->is_system_user || in_array('view_jobs', $templatePermissions) )
                    <li class="menu-dropdown">
                        <a href="{{url('/view-jobs')}}">
                            <i class="fa fa-list-alt"></i>
                            <span>Posted Job</span>
                        </a>
                    </li>
                @endif
                @if( $templateUser->is_system_user || in_array('view_job_board', $templatePermissions) )
                    <li class="menu-dropdown">
                        <a href="{{url('/job-board')}}">
                            <i class="fa fa-joomla"></i>
                            <span>Job Board</span>
                        </a>
                    </li>
                @endif
                @if( $templateUser->is_system_user || in_array('view_online_application', $templatePermissions) )
                    <li class="menu-dropdown">
                        <a href="{{url('/application-list')}}">
                            <i class="fa fa-list-ol"></i>
                            <span>Application List</span>
                        </a>
                    </li>
                @endif
                @if( $templateUser->is_system_user )
                    <li class="menu-dropdown">
                        <a href="#">
                            <i class="fa fa-object-group"></i>
                            <span>CMS</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ url('sliders') }}">
                                    <i class="fa fa-list-ul"></i>
                                    Sliders List
                                </a>
                            </li>
                        </ul>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ url('testimonials') }}">
                                    <i class="fa fa-list-ul"></i>
                                    Testimonials List
                                </a>
                            </li>
                        </ul>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ url('teachers') }}">
                                    <i class="fa fa-list-ul"></i>
                                    Teacher List
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li class="menu-dropdown">
                        <a href="{{url('/video_chat')}}">
                            <i class="fa fa-video-camera"></i>
                            <span> Video Conference</span>
                        </a>
                    </li>
            </ul>
            <!-- / .navigation -->
        </div>
        <!-- menu -->
    </section>
    <!-- /.sidebar -->
</aside>
