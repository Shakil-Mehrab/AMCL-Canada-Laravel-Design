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


<!-- ajax pagination -->
<!-- controller -->
public function pagination(Request $request)
  {
    if ($request->ajax()) {
      $datas = Product::orderBy('id', 'desc')
        ->pagination(request('per-page'));
      $columns = Product::columns();
      return view('layouts.table', compact('datas', 'columns'))->render();
    }
  }
  <!-- route -->
      Route::get('/admin/pagination/product',[App\Http\Controllers\Admin\Product\ProductController::class, 'pagination']);

    <!-- script -->
     // pagination 
        $(function() {
            $(document).on('click', '.paginate_reload_prevent a', function(e) {
                e.preventDefault();
                var page = $(this).data('id');
                getMoreDatas(page)
            });
        });
        function getMoreDatas(page) {
            $.ajax({
                type: "GET",
                url: "{{URL::to('/admin/pagination/product')}}" + '?page=' + page,
                success: function(data) {
                    $('#newData').html(data);
                }
            });
        }
<!-- blade file -->
<div id="newData">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                @foreach($columns as $column)
                <th>{{ $column }}</th>
                @endforeach
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($datas as $data)
            <tr class="bordered">
                @foreach($columns as $column)
                @if($column!='thumbnail')
                <td>{{$data->$column}}</td>
                @else
                <td><img src="{{asset($data->$column)}}" alt="No image" width="50px"></td>
                @endif
                @endforeach
                <td>
                    <a href="{{url('admin/edit/product',$data->slug)}}" style="color:blue"><i class="fas fa-pencil-alt"></i></a>
                    <a href="{{url('admin/delete/product',$data->slug)}}" style="color:red"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>
            @empty
            @endforelse
        </tbody>
    </table>
    <nav aria-label="..." class="pagintion_nav">
        <ul class="pagination">
            <li class="page-item paginate_reload_prevent">
                @if($datas->currentPage()=='1')
                <span class="page-link">Previous</span>
                @else
                <a class="page-link" data-id="{{$datas->currentPage()-1}}" href="#">Previous</a>
                @endif
            </li>
            @for($i=1;$i<=$datas->lastPage();$i++)
                <li class="page-item paginate_reload_prevent {{ $datas->currentPage()==$i ? 'active' : '' }}" >
                    <a class="page-link" data-id="{{$i}}" href="#">{{$i}}</a>
                </li>
                @endfor
                <!-- <li class="page-item active" aria-current="page">
                <span class="page-link">2</span>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li> -->
                <li class="page-item paginate_reload_prevent">
                    @if($datas->currentPage()==$datas->lastPage())
                    <span class="page-link">Next</span>
                    @else
                    <a class="page-link" data-id="{{$datas->currentPage()+1}}" href="#">Next</a>
                    @endif
                </li>
        </ul>
    </nav>
</div>