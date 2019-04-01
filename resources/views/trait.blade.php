trait banao

App\Model
use App\Traits\Eloquent\OrderableTrait;
public function welcome()
{ 
use OrderableTrait;
}
//controller
 public function welcome()
{                  
   $top_news=News::orderBY('id','desc')->latestTop();      
}