@if($teachers)
    <section id="teachers" class="alt-background">
        <div class="container">

            <h2>Teachers</h2>

            <ul class="teachers">
                @foreach($teachers as $teacher)
                    <li class="col-lg-3 col-md-4 col-sm-6">
                        <img src="{{ asset('storage/teachers_image/'.$teacher->front_page_image)}}" alt="" class="img-responsive"/>
                        <div class="description">
                            <h3>{{$teacher->title}}</h3>
                            <p>{{$teacher->excerpt}}</p>
                            <a href="{{url('teacher', ['slug'=>$teacher->slug])}}">Read More <i class="fa fa-angle-right"></i></a>
                        </div>
                    </li>
                @endforeach
            </ul>

        </div>
    </section>
@endif
