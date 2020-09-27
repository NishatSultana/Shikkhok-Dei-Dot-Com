@if($sliders)

    <div id="slides">
        @foreach($sliders as $slider)
        <div class="slides-container">
            <img src="{{asset('storage/slider_image/'.$slider->image)}}" alt=""/>
        </div>

        <div class="tint"></div>

        <!-- SLIDER OFFERS START -->
        <div class="slider-offers text-center">
            <ul>
                <li>
                    <h3>{{$slider->title}}</h3>
                    <h4>{{$slider->description}}</h4>
                </li>
            </ul>
        </div>
        <!-- SLIDER OFFERS END -->
        @endforeach
        <a class="arrow" href="#welcome">
            <i class="fa fa-arrow-down fa-2x"></i>
        </a>
    </div>
@endif
