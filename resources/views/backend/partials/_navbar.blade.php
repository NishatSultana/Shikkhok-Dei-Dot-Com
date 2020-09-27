<nav class="navbar navbar-static-top" role="navigation">
    <a href="{{url('/dashboard')}}" class="logo">
        শিক্ষক দেই ডট কম
    </a>

    <div>
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <i
                class="fa fa-th-list"></i>
        </a>
    </div>
    <div class="navbar-right">
        <ul class="nav navbar-nav">
            <!--rightside toggle-->
            <!-- User Account: style can be found in dropdown-->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle padding-user" data-toggle="dropdown">
                    @if($templateUser->profile_pic)
                        <img src="{{ asset('storage/user_image/'.$templateUser->profile_pic)}}" width="35"
                             class="img-circle img-responsive pull-left"
                             height="35" alt="User Image">
                    @else
                        <img src="{{ asset('backend/img/original.jpg')}}" width="35"
                             class="img-circle img-responsive pull-left"
                             height="35" alt="User Image">
                    @endif
                    <div class="riot">
                        <div>
                            {{$templateUser->full_name}}
                            <span><i class="caret"></i></span>
                        </div>
                    </div>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    @if($templateUser->profile_pic)
                        <li class="user-header">
                            <img src="{{ asset('storage/user_image/'.$templateUser->profile_pic)}}" class="img-circle"
                                 alt="User Image">
                        </li>
                    @else
                        <li class="user-header">
                            <img src="{{ asset('backend/img/original.jpg')}}" class="img-circle"
                                 alt="No Image">
                        </li>
                    @endif
                <!-- Menu Body -->
                    @if( $templateUser->is_system_user || in_array('view_profile', $templatePermissions))
                        <li class="p-t-3"><a href="{{route('profile_view')}}"> <i class="fa fa-user"></i> My Profile
                            </a>
                        </li>
                    @endif
                    @if( $templateUser->is_system_user || in_array('change_profile', $templatePermissions))
                        <li class="p-t-3"><a href="{{url('/change-profile')}}"> <i class="fa fa-edit"></i> Edit Profile
                            </a>
                        </li>
                    @endif
                    <li role="presentation"></li>
                    @if( $templateUser->is_system_user || in_array('change_password', $templatePermissions))
                        <li><a href="{{url('/password-change')}}"> <i class="fa fa-key"></i> Change Password </a>
                        </li>
                    @endif
                    <li role="presentation" class="divider"></li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-right">
                            <a href="{{ url('logout') }}">
                                <i class="fa fa-arrow-circle-o-right"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
