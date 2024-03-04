<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome',function(){
    return view('loandingpage');
})->name('loandingpage');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function (){

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('auth/user',function(){

        if(auth()->check()){
            return response()->json([
                'authUser' => auth()->user(),
            ]);

            return null;
        }

        

    });

    Route::get('/chat/{chat}',[ChatController::class,'show'])->name('chat.show');

    Route::post('/chat/with/',[ChatController::class,'chat_with'])->name('chat.with');

    Route::get('/chat/{chat}/get_users',[ChatController::class,'get_users'])->name('chat.get_users');

    Route::get('/chat/{chat}/get_messages',[ChatController::class,'get_messages'])->name('chat.get_messages');

    Route::post('/message/sent',[MessageController::class,'sent'])->name('message.sent');
    



   
});
