//Notification table
   php artisan notifications:table
//Nofification replied
  php artisan make:notification RepliedToThread

  <li class="dropdown option-box" id='markasread' onclick="markNotificationAsRead('{{count(auth()->user()->unreadNotifications)}}')">
        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">  <span class="glyphicon glyphicon-globe"></span> Notifications <span class="badge">{{count(auth()->user()->unreadNotifications)}}</span></a>

        <div class="dropdown-menu">
              @forelse(auth()->user()->unreadNotifications as $notification) 
                @include('admin.news.notifications.'.snake_case(class_basename($notification->type)))
                @empty
                <a class="dropdown-item" href="#">No Notifications</a>
                @endforelse

         </div>
</li>

//@include('admin.news.notifications

@if(!empty($notification->data['property']['title']))
    <a class="dropdown-item" href="{{route('comment.show',$notification->data['property']['id'])}}">
        {{$notification->data['user']['name']}} commented on <strong> {{$notification->data['property']['title']}}</strong> 
        </a> 
@endif  






//notification


<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RepliedToProperty extends Notification
{
    use Queueable;
    protected $property;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($property)
    {
        $this->property=$property;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
        
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toDatabase($notifiable)
    { 
        return [
         'property'=> $this->property,
         'user'=>auth()->user()
        ];
    }
//subscribder  joonno
public function toMail($notifiable)
    {
    return (new MailMessage)
                ->greeting('Hellow Viwers')
                ->subject($this->submit_properties->title)
                ->line('New Post By'.$this->submit_properties->user->name)
                ->action('Click here to view the News', route('property.detail',$this->submit_properties->id))
                ->line('Na Dekhle Chram Miss');
}
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}


//notification table
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type');
            $table->morphs('notifiable');
            $table->text('data');
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}



//controller
public function postCommentStore(Request $request,$id)
    {
         $this->validate($request,[
            "customer"=>"required|max:100",           
            "review"=>"required",
            "star"=>"required", 
            "email"=>"required"           
         ]);
       
         $property=Property::where('id',$id)->first();
         $review=new Review();
         $review->customer=$request['customer'];        
         $review->review=$request['review'];
         $review->star=$request['star'];  
         $review->email=$request['email']; 
         $review->property_id=$id;  
         $review->save();
    //comment Notification er jonnno
         $property->user->notify(new RepliedToProperty($property));
    
    
    // Notun poster jonno property controoller a use korbo
    $request->user()->properties()->save($submit_properties);
         foreach($subscribers as $subscriber){
            Notification::route('mail', $subscriber->email)->notify(new  NewPostNotify($submit_properties));
        }
    
        
        return redirect()->back()->withMessage("Comment Created !");
    }



