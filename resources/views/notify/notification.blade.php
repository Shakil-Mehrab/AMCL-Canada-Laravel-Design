//Notification table
   php artisan notifications:table
//Nofification replied
  php artisan make:notification RepliedToThread

<li class="nav-item dropdown" id='markasread' onclick="markNotificationAsRead('{{count(auth()->user()->unreadNotifications)}}')">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
     <i class="far fa-bell"></i> <span class="label label-warning">{{count(auth()->user()->unreadNotifications)}}</span>
    </a>
    <ul class="dropdown-menu" role="menu">
        <li><h4><span style="color: orange;margin-left: 5px">Unread Notifiction</span></h4>
            @forelse(auth()->user()->unreadNotifications as $notification) 
            {{-- @include('admin.includes.notifications.'.snake_case(class_basename($notification->type))) --}}
            @include('admin.includes.notifications.replied_to_product')

            @empty
            <a href="#">No Unread Notifications</a>
            @endforelse
        </li>
    <hr>
        <li> <h4><span style="color: orange;margin-left: 5px">Read Notifiction</span></h4>
            @forelse(auth()->user()->readNotifications as $notification) 
            {{-- @include('admin.includes.notifications.'.snake_case(class_basename($notification->type))) --}}
            @include('admin.includes.notifications.replied_to_product')
            
            @empty
            <a href="#">No Notifications</a>
            @endforelse
        </li>
    </ul> 
</li>

admin.news.notifications.replied_to_product  //upore replied_to_product nei.but ekhane dite hobe.actually ati snake_case(class_basename($notification->type) ehan theke ase
@if(!empty($notification->data['product']['id'] && $notification->type=="App\Notifications\RepliedToProduct" ))
    <a class="dropdown-item" href="{{route('single-product.show',$notification->data['product']['id'])}}"><strong>{{$notification->data['user']['name']}}</strong> commented on <strong> {{$notification->data['product']['name']}}</strong> {{$notification->created_at->diffForHumans()}}</a>
{{--      @if($notification->created_at->diffForHumans()<="24 hours ago")
        <a class="dropdown-item" href="{{route('single-product.show',$notification->data['product']['id'])}}">{{$notification->data['user']['name']}} commented on <strong> {{$notification->data['product']['name']}}</strong> {{$notification->created_at->diffForHumans()}}</a>

        @elseif($notification->created_at->diffForHumans()=="1 day ago")
        <a class="dropdown-item" href="{{route('single-product.show',$notification->data['product']['id'])}}">{{$notification->data['user']['name']}} commented on <strong> {{$notification->data['product']['name']}}</strong> {{$notification->created_at->diffForHumans()}}</a> 
    
    @elseif($notification->created_at->diffForHumans()=="2 days ago")
        <a class="dropdown-item" href="{{route('single-product.show',$notification->data['product']['id'])}}">{{$notification->data['user']['name']}} commented on <strong> {{$notification->data['product']['name']}}</strong> {{$notification->created_at->diffForHumans()}}</a> 
    
    @else
        <a class="dropdown-item" href="{{route('single-product.show',$notification->data['product']['id'])}}">{{$notification->data['user']['name']}} commented on <strong> {{$notification->data['product']['name']}}</strong> {{$notification->created_at->diffForHumans()}}</a> 
    @endif --}}
@endif  
@if(!empty($notification->data['product']['id'] && $notification->type=="App\Notifications\CreatedPostNotification" ))
    <a class="dropdown-item" href="{{route('single-product.show',$notification->data['product']['id'])}}"><strong>{{$notification->data['user']['name']}}</strong> has created <strong> {{$notification->data['product']['name']}}</strong> {{$notification->created_at->diffForHumans()}}</a>
{{--      @if($notification->created_at->diffForHumans()<="24 hours ago")
        <a class="dropdown-item" href="{{route('single-product.show',$notification->data['product']['id'])}}">{{$notification->data['user']['name']}} commented on <strong> {{$notification->data['product']['name']}}</strong> {{$notification->created_at->diffForHumans()}}</a>

        @elseif($notification->created_at->diffForHumans()=="1 day ago")
        <a class="dropdown-item" href="{{route('single-product.show',$notification->data['product']['id'])}}">{{$notification->data['user']['name']}} commented on <strong> {{$notification->data['product']['name']}}</strong> {{$notification->created_at->diffForHumans()}}</a> 
    
    @elseif($notification->created_at->diffForHumans()=="2 days ago")
        <a class="dropdown-item" href="{{route('single-product.show',$notification->data['product']['id'])}}">{{$notification->data['user']['name']}} commented on <strong> {{$notification->data['product']['name']}}</strong> {{$notification->created_at->diffForHumans()}}</a> 
    
    @else
        <a class="dropdown-item" href="{{route('single-product.show',$notification->data['product']['id'])}}">{{$notification->data['user']['name']}} commented on <strong> {{$notification->data['product']['name']}}</strong> {{$notification->created_at->diffForHumans()}}</a> 
    @endif --}}
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

//js file
 function markNotificationAsRead(){
    $.get('/markAsRead');
}   
//route
 Route::get('/markAsRead', function(){
    auth()->user()->unreadNotifications->markAsRead();
});
//some times it needed wamp restart