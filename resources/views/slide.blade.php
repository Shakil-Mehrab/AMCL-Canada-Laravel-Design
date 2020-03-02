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