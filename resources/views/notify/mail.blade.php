//sharing form
<div class="panel panel-default">
    <div class="panel panel-heading">Share Listing <em>{{$new->heading}}</em></div>
    <div class="panel-body">
        @include('admin.includes.message')
        <p>Share to Up to 5 people</p>
        <form method="POST" action="{{route('news.share.store',$new->id)}}">
            @csrf
           @foreach(range(0,4) as $n)
            <div class="form-group{{$errors->has('emails.'.$n) ? ' has-error' : ''}}">
                <label for="emails.{{$n}}" class="hidden">Email</label>
                <input type="text" name="emails[]" id="emails.{{$n}}" class="form-control" placeholder="someone@somewhere.com" value="{{ old('emails.'.$n) }}">  
                   @if ($errors->has('emails.'.$n))
                        <span class="help-block">
                            <strong>{{ $errors->first('emails.'.$n) }}</strong>
                        </span>
                    @endif            
            </div>
           @endforeach
            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                <label for="message">Message(Optional)</label>
                <textarea type="text" name="message" id="message"  class="form-control" col="30" rows="8">{{ old('message') }}</textarea>
                @if ($errors->has('message'))
                        <span class="help-block">
                            <strong>{{ $errors->first('message') }}</strong>
                        </span>
                    @endif     
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Send</button>       
            </div>
        </form>
    </div>
</div>
//controller
use Mail;
use App\Mail\NewsShared;

 public function  store(StoreNewsShareRequest $request,$news_id)
	{    
    $listing=News::find($news_id);
		collect(array_filter($request->emails))->each(function($email) use ($listing,$request){
 		  Mail::to($email)->queue(
          new NewsShared($listing,$request->user(),$request->message)
          );  
		}); 
        return redirect()->back()->withSuccess("Listing shared succesfully");
    }
//github
php artisan make:mail NewsShared
//Mail/NewsShared
<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Model\News;
use App\User;

class NewsShared extends Mailable
{
    use Queueable, SerializesModels;
    public $listing;
    public $sender;
    public $body;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(News $listing,User $sender,$body=null)
    {
        $this->listing=$listing;
        $this->sender=$sender;
        $this->body=$body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('front.news.email.shared-email')
        ->subject("{$this->sender->name} shared a News with you")
        ->from('hallow@fresh.com');
    }
}

//front.news.email.shared-email
{{$sender->name}} has shared a News, <a href="{{route('new.single',$listing->id)}}">{{$listing->heading}}</a>.<br><br>
@if($body)
---<br>
{!! nl2br(e($body)) !!}<br>
---<br><br>
@endif


// gmail a mail pathate chaile 
originam gmail dao
and original password dao;
google account>security>Less secure app access>turn on
