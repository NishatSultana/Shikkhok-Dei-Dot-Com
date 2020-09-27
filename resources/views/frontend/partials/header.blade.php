<header>
    <!-- ==== TOOLS START ==== -->
    <div class="tools">
        <div class="container">
            <ul class="pull-left">
                <li><a href="tel:01516000000"><i class="fa fa-phone"></i><span>01516000000</span></a></li>
                <li><a href="mailto:info@codemechanix.com"><i class="fa fa-envelope"></i><span>info@codemechanix.com</span></a></li>
            </ul>
            <nav class="pull-right">
                <ul>
                    <li><a href="{{url('/sign-up')}}"><i class="fa fa-user"></i><span>Register</span></a></li>
                    <li><a href="{{url('/login')}}"><i class="fa fa-lock"></i><span>Log In</span></a></li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- ==== TOOLS END ==== -->
    <!-- ==== NAVBAR START ==== -->
    <div class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{url('/')}}" class="navbar-brand"><img src="{{ asset('frontend/images/logo.png')}}" alt="Online Tutor" class="img-responsive logo" /></a>
            </div>
            <nav class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('/teachers-list')}}">Teachers</a></li>
                    <li><a href="{{url('/about-us')}}">About</a></li>
                    <li><a href="{{url('/contact-us')}}">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- ==== NAVBAR END ==== -->

</header>
