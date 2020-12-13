<div onclick="show_hide()" class="button"><span style="color:red">drop</span></div>">
    <div style="display: none;" id="dued">
        <a>this is nice</a><br>
        <a>this is nice</a><br>
        <div onclick="show_hde()" class="button"><span style="color:red">tue</span></div>">
         <div style="display: none;" id="dud">
        <a>this is nice</a><br>
        <a>this is nice</a><br>
        <a>this is nice</a><br>
          </div>
        <a>this is nice</a><br>
       
    </div>
                                          
//js
<script>
        function show_hide(){
            var click=document.getElementById('dued');
            if(click.style.display==="none"){
                click.style.display="block";
            }else{
                click.style.display="none";
            }
        }
         function show_hde(){
            var click=document.getElementById('dud');
            if(click.style.display==="none"){
                click.style.display="block";
            }else{
                click.style.display="none";
            }
        }
        
    </script> 


<!-- live wire dripdown and onchange dropdown -->
<!-- livewire balde file -->
    <form wire:submit.prevent="create"  >
    <div>
        <div class="md-4">
            <label for="">Country</label>
            <select class="form-control" wire:model="newFolderState.user_id" wire:change="foundCities">
                <option value="">Choose One</option>
                @forelse ($this->users() as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @empty
                @endforelse
            </select>
        </div>
    </div>
    @if($this->foundCities())
    <div>
        <div class="md-4">
            <label for="">Cities</label>
            <select class="form-control" wire:model="newFolderState.category_id">
                <option value="">Choose One</option>
                @forelse ($this->foundCities() as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @empty
                @endforelse
            </select>
        </div>
    </div>
    @endif
    <input type="submit" value="Submit" class="btn btn-success">
</form>
<!-- livewire php funntion -->
<?php

namespace App\Http\Livewire\Ckeditor;
class Editor extends Component
{
    public $cities=[];
    public function users()
    {
        return User::all();
    }

    public $newFolderState=[
        "user_id"=>"",
        "category_id"=>""

    ];
    public function foundCities()
    {
        if($this->newFolderState['user_id']){
            return Category::where('user_id',$this->newFolderState['user_id'])->get();
        }
        return;

    }
    public function create(){
        dd($this->newFolderState);
    }
    public function render()
    {
        return view('livewire.ckeditor.editor');
    }
}

