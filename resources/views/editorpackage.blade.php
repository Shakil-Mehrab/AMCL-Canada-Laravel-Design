1.Bootstrap 4, Font awesome 4, Font Awesome 5 Free & Pro snippets
2.Laravel Extension Pack
3.PHP Namespace Resolver
4.Vue.js Extension Pack
5.vetur
6.Highlight Matching Tag
7.theme(dark+(Default dark))
8.PHP IntelliSense
9.Format HTML in PHP
10.Laravel Blade formatter
11.PHP Formatter
12.Tailwind CSS IntelliSense


//////////////////

b4-card-links   for product with name,description,add to cart
forelse



//ck editor
<!-- live wire blade -->
<form wire:submit.prevent="create"  >
    <div >
        <input type="text" wire:model="newFolderState.title" class="form-control" /><br>
    </div>
    <div wire:ignore>
        <label for="">Short Description</label><br>
        <textarea id="my-editor" name="desc" wire:model="newFolderState.desc"
            class="form-control"></textarea><br>
    </div>
   
    <input type="submit" value="Submit" class="btn btn-success">
</form>
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script>
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };

</script>
<script>
    CKEDITOR.replace('my-editor').on('change',function(e){
        @this.set('newFolderState.desc',e.editor.getData());
    });
</script>


<!-- livewire php -->
public function users()
{
    return User::all();
}

public $newFolderState=[
    "title"=>"",
    "desc"=>"",

];

public function create(){
    dd($this->newFolderState);
}
public function render()
{
    return view('livewire.ckeditor.editor');
}