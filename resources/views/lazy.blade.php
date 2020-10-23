<?php

namespace App\Http\Controllers\Layout;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\LazyCollection;

class PublicController extends Controller
{

    public function welcome(){
        // function happyFunction($string)
        // {
        //     foreach($string as $result){
        //         dump('start');
        //            yield $result;
        //         dump('end');
        //     }
        // }
        // foreach(happyFunction(['one','two','three']) as $result){
        //     if($result=='two'){
        //         return;
        //     }
        //     dump($result);
        // }
        // function notHappyFunction($number){
        //     $return=[];
        //     for($i=1;$i<$number;$i++){
        //         $return[]=$i;
        //     }
        //     return $return;
        // }
        function happyFunction($number){
            for($i=1;$i<$number;$i++){
                yield $i;
            }
        }
        foreach(happyFunction(10000000) as $number){
            if($number%1000==0){
                dump('hellow');
            }
        }
    }
   //  public function lazy(){
   //      $collection=Collection::times(10000000)
   //      ->map(function($number){
   //          return pow(2,$number);
   //      });

   //      $collection=LazyCollection::times(10000000)
   //      ->map(function($number){
   //          return pow(2,$number);
   //      });
   //  return "done";
   // }
}
