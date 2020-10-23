https://github.com/akr4m/Filter-Scoping
composer require akr4m/scoping

////model
use akr4m\scoping\Traits\CanBeScoped;
class Post extends Model
{
    use CanBeScoped;
}
///controller
public function __invoke(Request $request)
{
    $posts  = App\Post::withScopes($this->scopes())->get();
}

protected function scopes()
{
    return [
        // Must declare the `Scope` files
        'topic' => new TopicScope(),
        'month' => new MonthScope(),
        'year' => new YearScope(),
    ];
}

////////TopicScope
use akr4m\scoping\Scoping\Contracts\Scope;
use Illuminate\Database\Eloquent\Builder;

class TopicScope implements Scope  //////for relation
{
    public function apply(Builder $builder, $value)
    {
        return $builder
            ->whereHas('topics', function ($builder) use ($topic) {
                $builder->where('slug', $value);
            });
    }
}
<?php

namespace App\Http\Scopes;

use Illuminate\Database\Eloquent\Builder;
use akr4m\scoping\Scoping\Contracts\Scope;

class PositionScope implements Scope/////////////for filtering of own attribute
{
    public function apply(Builder $builder, $value)
    {
        return $builder->where('position', $value);
    }
}

//////////////// helper
array() problem can be occured;
larave helper function needed
https://github.com/laravel/helpers
composer require laravel/helpers