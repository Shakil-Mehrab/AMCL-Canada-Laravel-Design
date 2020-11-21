https://github.com/verlok/vanilla-lazyload

<img  src="{{asset('icon.png')}}" data-src="{{asset('/uploads/categories/'.$cat->image)}}" class="photo" alt="">
<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.1.3/dist/lazyload.min.js"></script>
<script>
   const lazyLoadInstance = new LazyLoad({
       elements_selector: ".photo"
   })
</script>