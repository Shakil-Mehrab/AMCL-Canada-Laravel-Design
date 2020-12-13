<!-- livewire pagination -->
<!-- livewire php -->
use WithPagination; //helps to paginate witrout loading
public function articles()
{
    return Article::paginate(10);
}
<!-- livewirwe bade -->
{{ $this->articles()->links() }}


<!-- perpage paginate -->
<label for="paginate" class="whitespace-no-wrap inline-block text-sm font-medium text-gray-700 mr-3">Per-Page</label>
    <select id="paginate" name="paginate" class="mt-1 block p-2 py-1 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="paginate">
        @foreach (collect([10, 20, 50, 100]) as $perPage)
            <option value="{{ $perPage }}">{{ $perPage }}</option>
        @endforeach
    </select>
<!-- livewire php -->
     use WithPagination;

    public $paginate;

    public function mount($paginate = 20)
    {
        $this->paginate = $paginate;
    }

    /**
     * articles
     *
     * @return void
     */
    public function articles()
    {
        return Article::latest()->paginate($this->paginate);
    }
