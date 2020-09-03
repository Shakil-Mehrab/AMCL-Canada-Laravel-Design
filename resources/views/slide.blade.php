<link href="{{asset('style/admin/bootstrap/css/rating.css')}}" rel="stylesheet">
 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css" integrity="sha256-zmfNZmXoNWBMemUOo1XUGFfc0ihGGLYdgtJS3KCr/l0=" crossorigin="anonymous" />

<link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/bootstrap.min.css')}}" media="all" />






        <div class="container-fluid">
            <main>
              <div class="container-fluid p-0">
                <div class="site-slider">
                  <div class="slider-one">
                    @forelse($slides as $slide)
                    <div style="max-height: 400px">
                       <img src="{{asset($slide->image)}}" data-echo="{{asset($slide->image)}}" width="100%"  alt="">
                    </div>
                    @empty
                    @endforelse
                  </div>

                  <div class="slider-btn">
                    <span class="prev position-top"><i class="fas fa-chevron-left"></i></span>
                    <span class="next position-top right-0"><i class=" fas fa-chevron-right"></i></span>
                  </div>
                </div>
              </div>
            </main>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
            <script src="{{asset('style/style/main.js')}}"></script>     
        </div>








<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Electronics - eCommerce HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.png">

    <link rel="stylesheet" href="{{asset('bazarbaarifront/css/bootstrap/css/bootstrap.min.css')}}">

</head>
<body>
@php
use App\Model\Slide;
$slides=Slide::all();
@endphp
    <div class="col-md-8">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
            @for($i=0;$i<5;$i++)
            @if($i==0)
                <li data-target="#carousel-example-generic" data-slide-to="{{$i}}" class="active"></li>
                @else
                <li data-target="#carousel-example-generic" data-slide-to="{{$i}}"></li>
            @endif
            @endfor
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              @php $check=0; @endphp
              @forelse($slides as $slide)
               @php $check=$check+1;@endphp
                 @if($check==1)
                    <div class="item active">
                      <img src="{{$slide->image}}" style="width:100%;height: auto;" alt="Slider">
                      <div class="carousel-caption">

                      </div>
                    </div>
                 @else
                    <div class="item">
                      <img src="{{$slide->image}}" style="width:100%;height: auto;" alt="Slider">
                      <div class="carousel-caption">

                      </div>
                    </div>
                @endif
            @empty
            @endforelse
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('bazarbaarifront/js/jquery-2.2.4.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bazarbaarifront/js/bootstrap.min.js')}}"></script>
</body>

</html>