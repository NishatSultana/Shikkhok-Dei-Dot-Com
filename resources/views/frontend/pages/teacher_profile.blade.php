@extends('frontend.layouts.master')
@section('title', 'Teacher Profile')
@section('content')
    @if($details)
        <div class="title">
            <div class="title-image"></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        Profile Details
                    </div>
                </div>
            </div>
        </div>

        <!-- ========== CONTENT START ========== -->
        <section id="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <img src="{{ asset('storage/teachers_image/'.$details->details_page_image)}}" alt=""
                             class="img-responsive"/>
                    </div>
                    <div class="col-sm-6">
                        <h1>{{$details->title}}</h1>
                        <p>{{$details->describes}}</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- ========== CONTENT END ========== -->

        <!-- ========== REVIEWS START ========== -->
        @if($testimonial_details)
            <section id="teachers-reviews">
                <div class="tint"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center" data-scroll-reveal>

                            <!-- OWL CAROUSEL START -->
                            <div class="owl-carousel">
                                @foreach($testimonial_details as $testimonial)
                                    <div class="item">
                                        <blockquote>{{$testimonial->message}}<small>{{$testimonial->name_designation}}</small></blockquote>
                                    </div>
                                @endforeach
                            </div>
                            <!-- OWL CAROUSEL END -->

                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- ========== REVIEWS END ========== -->

        <!-- ========== SKILLS START ========== -->
        {{--    <section id="skills">--}}
        {{--        <div class="container">--}}
        {{--            <div class="row">--}}
        {{--                <div class="col-sm-12">--}}
        {{--                    <h2>John's key skills</h2>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="row">--}}
        {{--                <div class="col-sm-6">--}}
        {{--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eu tellus ipsum. Nunc maximus sapien ac dui vulputate tincidunt. Morbi luctus nisi vel suscipit volutpat. Donec vitae auctor nisl. Ut malesuada felis in erat rutrum ultrices. Fusce iaculis ornare nunc rutrum ornare. Proin ut placerat enim, vel venenatis urna. Phasellus sed diam tincidunt mauris malesuada mattis et in nisl. Quisque massa eros, molestie at mi eget, aliquam tristique eros. Nullam aliquet placerat magna ut eleifend. Phasellus iaculis tristique laoreet.Donec vitae auctor nisl. Ut malesuada felis in erat rutrum ultrices. Fusce iaculis ornare nunc rutrum ornare. Proin ut placerat enim, vel venenatis urna. Phasellus sed diam tincidunt mauris malesuada mattis et in nisl. Quisque massa eros, molestie at mi eget, aliquam tristique eros.</p>--}}
        {{--                </div>--}}
        {{--                <div class="col-sm-6">--}}
        {{--                    <div class="progress">--}}
        {{--                        <div class="progress-bar" role="progressbar" data-transitiongoal="90">--}}
        {{--                            <span class="pull-left">Progresssive Web Design</span>--}}
        {{--                            <span class="pull-right">90%</span>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="progress">--}}
        {{--                        <div class="progress-bar" role="progressbar" data-transitiongoal="100">--}}
        {{--                            <span class="pull-left">HTML5</span>--}}
        {{--                            <span class="pull-right">100%</span>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="progress">--}}
        {{--                        <div class="progress-bar" role="progressbar" data-transitiongoal="80">--}}
        {{--                            <span class="pull-left">CSS3</span>--}}
        {{--                            <span class="pull-right">80%</span>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="progress">--}}
        {{--                        <div class="progress-bar" role="progressbar" data-transitiongoal="70">--}}
        {{--                            <span class="pull-left">jQuery</span>--}}
        {{--                            <span class="pull-right">70%</span>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="progress">--}}
        {{--                        <div class="progress-bar" role="progressbar" data-transitiongoal="80">--}}
        {{--                            <span class="pull-left">Online Marketing</span>--}}
        {{--                            <span class="pull-right">80%</span>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="progress">--}}
        {{--                        <div class="progress-bar" role="progressbar" data-transitiongoal="90">--}}
        {{--                            <span class="pull-left">SEO</span>--}}
        {{--                            <span class="pull-right">90%</span>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--    </section>--}}
        <!-- ========== SKILLS END ========== -->
    @endif
@endsection
@section('scripts')
@endsection
