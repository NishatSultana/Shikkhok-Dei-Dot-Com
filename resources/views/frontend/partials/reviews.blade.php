@if($testimonials)
    <section id="about-reviews">
        <div class="tint"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center" data-scroll-reveal>

                    <h2>What Our Students Say</h2>

                    <!-- OWL CAROUSEL START -->
                    <div class="owl-carousel">
                        @foreach($testimonials as $testimonial)
                            <div class="item">
                                <blockquote>{{$testimonial->message}} <small>{{$testimonial->name}}, {{$testimonial->designation}}</small></blockquote>
                            </div>
                        @endforeach

                    </div>
                    <!-- OWL CAROUSEL END -->

                </div>
            </div>
        </div>
    </section>
@endif
