//table
Schema::create('user_property_views', function (Blueprint $table) {
    $table->increments('id');
    $table->integer('user_id')->unsigned();
    $table->integer('property_id')->unsigned();
    $table->integer('count');
    $table->timestamps();

    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
});
//Model
  public function property(){
        return $this->belongsTo('App\Model\Property');
    }
 //controller
use App\Jobs\UserViwedNews;

   $new=Property::find($detail_id);
	 if($request->user()){
	   dispatch(new UserViwedNews($request->user(),$new));  
	}  
//job
<?php

use App\User;
use App\Model\Property;

class UserViwedNews implements ShouldQueue
{
    public $user;
    public $listing;
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(User $user,Property $listing)
    {
        $this->user=$user;
        $this->listing=$listing;
    }

    public function handle()
    {
         $viewed=$this->user->viewedListings;
        if($viewed->contains($this->listing)){
            $viewed->where('id',$this->listing->id)->first()->pivot->increment('count');
            return;
        }
        $this->user->viewedListings()->attach($this->listing,[
            'count'=>1
        ]);
    }
}
//User Model
public function viewedListings(){
   return $this->belongsToMany(Property::class ,'user_property_views')->withTimestamps()->withPivot(['count','id']);
} 
//Proprty Model
public function viewedUsers(){
       return $this->belongsToMany(User::class ,'user_property_views')->withTimestamps()->withPivot(['count']);
    } 
    public function views(){
       return $this->viewedUsers()->sum('count');
       
    }
 //call
 $proprty->views();