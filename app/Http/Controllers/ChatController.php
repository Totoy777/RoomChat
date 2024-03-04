<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class ChatController extends Controller{

    public function __construct(){
        $this->middleware('auth');
       
    }

    public function chat_with(User $user, Request $request){

        $user_a = auth()->user();
        $user_b = User::where('email',$request->email)->first();

        if ($user_b) {
            $chat = $user_a->chats()->wherehas('users', function($q) use ($user_b){
    
                $q->where('chat_user.user_id',$user_b->id);
           
           })->first();
           
           if(!$chat){
               $chat = Chat::create([]);
           
               $chat->users()->sync([$user_a->id,$user_b->id]);
           }
           
               return redirect()->route('chat.show',$chat);
        } else {
            return redirect()->route('dashboard')->with('err','Usuario No Encontrado');
        }
       
    }

    public function show(Chat $chat){
        abort_unless($chat->users->contains(auth()->id()),403);

        return view('chat.chat',[
            'chat' => $chat
        ]);

    }

    public function get_users(Chat $chat){

        $users = $chat->users;

        return response()->json([

            'users' => $users,

        ]);
    }

    public function get_messages(Chat $chat){

        $messages = $chat->messages()->with('user')->get();

        return response()->json([

            'messages' => $messages,

        ]);
    }


}
