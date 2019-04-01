
//paginate

$all_popular_properties=Property::orderBY('views','desc')->paginate(3);
{!! $all_popular_properties->links(); !!}
