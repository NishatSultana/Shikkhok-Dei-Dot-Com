@if($teachers)
    <section id="featured-teachers" class="alt-background">
        <div class="container">

            <h2 class="carousel-title text-center">
                Featured Teachers
                <a href="#">Meet Our Staff</a>
            </h2>

            <!-- OWL CAROUSEL START -->
            <div class="owl-carousel">
                @foreach($teachers as $teacher)
                    <div class="item">
                        <img src="{{asset('storage/teachers_image/'.$teacher->front_page_image)}}" alt="" class="img-responsive"/>
                        <div class="description">
                            <h3>{{$teacher->title}}</h3>
                            <p>{{$teacher->excerpt}}</p>
                            <a href="{{url('teacher', ['slug'=>$teacher->slug])}}">Read More <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                @endforeach

            </div>
            <!-- OWL CAROUSEL END -->

        </div>
    </section>
@endif
