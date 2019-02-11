<?php

namespace App\Http\Controllers\Server;

use App\Model\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends DashboardController

{
   public function index(){
       $subData=Subscriber::orderBy('id','desc')->get();
       $this->data('subData',$subData);
       $this->data('title','Subscribers');
       return view($this->pagePath.'subscribers',$this->data);
   }

    public function deleteSubscriber(Request $request){
        if(!$request->sid){
            return redirect()->route('subscribers');
        }
        $subId=$request->sid;
        if(Subscriber::find($subId)->delete()){
            return redirect()->route('subscribers')->with('success','Subscriber was deleted');
        }
        return redirect()->route('subscribers')->with('success','Subscriber couldn\'t be deleted');
    }

    public function subscriberSearch(Request $request){
        if($request->isMethod('get')){
            return redirect()->route('subscribers');
        }
        if(!$request->sub_data){
            return redirect()->route('subscribers')->with('success','Please enter email to search');
        }
        $subData=$request->sub_data;
        $allSubs=Subscriber::where('email','LIKE',"%$subData%")->get();
        $this->data('subData',$allSubs);
        $this->data('title','SubscriberSearch');
        return view($this->pagePath.'subscribers',$this->data);
    }

    public function emailSubscriber(Request $request){
        if(empty($request->sid)){
            return redirect()->route('subscribers');
        }

        if($request->isMethod('get')){
            $subId=$request->sid;
            $subData=Subscriber::find($subId);
            $this->data('subData',$subData);
            return view($this->pagePath.'emailSubscriber',$this->data);
        }
        if($request->isMethod('post')){
            $subId=$request->sid;
            $subData=Subscriber::find($subId);
            $sendTo=$subData->email;
            $msg=strip_tags(html_entity_decode($request->message));
            $data['message']=$msg;
            if( Subscriber::where('id',$subId)->update($data)){
                Mail::send($this->pagePath.'mail',$data, function($message) use($sendTo,$msg) {
                    $message->to($sendTo, 'My Subscriber');
                    $message->subject($msg);
                    $message->from('bhattasuraj76@gmail.com','Suraj Bhatta');
                });
                return redirect()->route('subscribers')->with('success',' email was sent to the subscriber');
            }
            return redirect()->route('subscribers')->with('success','Sorry, email cannot be sent to the subscriber');
        }
    }
}
