
composer require laravel/scout
php artisan vendor:publish --provider="Laravel\Scout\ScoutServiceProvider"
SCOUT_DRIVER=tntsearch
public function toSearchableArray() {
        return [
            'id' => $this->id,
            'user_id' => $this->team_id,
            'name' => $this->objectable->name,
            // 'path' => $this->ancestorsAndSelf->pluck('objectable.name')->reverse()->join('/')
        ];
    }
php artisan scout:import "App\Models\Post"
<!-- model -->
use Laravel\Scout\Searchable;
use Searchable;
<!-- livewire php -->
 public function getResultsProperty() {

        // Determine if we have search query
        if(strlen($this->query)) {
            return Obj::search($this->query)->where('user_id', $this->currentTeam->id)->get();
        }
        return $this->object->children;
    }
<!-- livewire blade -->
    div class="border-2 border-gray-200 rounded-lg">
        <div class="py-2 px-3">
            <div class="flex items-center">
                @if($this->query)
                    <div class="font-bold text-gray-400">
                        Found {{ $this->results->count() }} {{ Str::plural('result', $this->results->count()) }}
                        <button wire:click="$set('query', null)" href="#" class="text-blue-500 text-sm ml-6">Clear Search</button>
                    </div>
                @else
                    @foreach($ancestors as $ancestor)
                        <a href="{{ route('files', ['uuid' => $ancestor->uuid]) }}" class="font-bold text-gray-400">
                            {{  $ancestor->objectable->name }}
                        </a>
                        @if(!$loop->last)
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-gray-300 w-5 h-5 mx-1">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>