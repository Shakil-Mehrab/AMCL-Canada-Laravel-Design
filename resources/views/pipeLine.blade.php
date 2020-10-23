{{-- Pipelining --}}

@forelse($slides as $slide)
<ul>
    <li>{{$slide->name}}</li>
    <li>{{$slide->status}}</li>
</ul>
@empty
@endforelse
{{$slides->appends(request()->input())->links()}} 


<?php

namespace App\Http\Controllers\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Pipeline\Pipeline;

class PublicController extends Controller
{
    // service container
    public function welcome(){
     $slides=Product::allProducts();
     return view('welcome',compact('slides'));
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class Product extends Model
{
    use HasFactory;
    //////////////////////////////////////data
    public static function allProducts(){
        return app(Pipeline::class)->send(Product::query())->through([
            \App\QueryFilters\Status::class,
            \App\QueryFilters\Sort::class,
            \App\QueryFilters\MaxCount::class,///paginate overlap the MaxCount.
        ])->thenReturn()->paginate(5);
        }

}



<?php

namespace App\QueryFilters;

use Closure;
use Illuminate\Support\Str;

abstract class Filter
{
    public function handle($request,Closure $next){
        if(!request()->has($this->filterName())){
            return $next($request);
        }
        $builder=$next($request);
        return $this->applyFilter($builder);
    }
    protected abstract function applyFilter($builder);
    protected function filterName(){
        return Str::snake(class_basename($this));
    }
}


<?php

namespace App\QueryFilters;

class Status extends Filter
{
    protected function applyFilter($builder){
        return $builder->where('status',request($this->filterName()));

    }
}

<?php

namespace App\QueryFilters;

class Sort extends Filter
{
    protected function applyFilter($builder){
        return $builder->orderBy('name',request($this->filterName()));
    }
}

<?php

namespace App\QueryFilters;

class MaxCount extends Filter
{
    protected function applyFilter($builder){
        return $builder->take(request($this->filterName()));
    }
}
