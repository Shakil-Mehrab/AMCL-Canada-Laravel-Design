https://github.com/staudenmeir/laravel-adjacency-list
composer require staudenmeir/laravel-adjacency-list:"^1.0"
<!-- model/onject -->
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;
HasRecursiveRelationships

public function files(Request $request)
{
    $object = Obj::with('children.objectable', 'ancestorsAndSelf.objectable')->where(
            'uuid', $request->get(
                'uuid',
                Obj::whereNull('parent_id')->first()->uuid
            )
        )
        ->firstOrFail();

    return view('files.index', [
        'object' => $object,
        'ancestors' => $object->ancestorsAndSelf()->breadthFirst()->get()
    ]);
}


 @foreach ($ancestors as $ancestor)
    <a href="{{ route('files', ['uuid' => $ancestor->uuid]) }}" class="font-bold text-gray-400">
        {{ $ancestor->objectable->name }}
    </a>

    @if (!$loop->last)
        <svg class="text-gray-300 w-5 h-5 mx-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
        </svg>
    @endif
@endforeach