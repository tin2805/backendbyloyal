<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jokes;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();

class HomeController extends Controller
{
    //
    public function index(){
        return view('layout');
    }
    public function homepage(){
        $joke = Jokes::where('joke_id', 1)->first();
        return view('pages.homepage')->with(compact('joke'));
    }
    public function nice_status($joke_id){
        // $joke_id = $request->all();
        $all =Jokes::all();
        $status = Jokes::where('joke_id', $joke_id)->first();
        $status->joke_status = 1;
        $status->update();
        $joke = Jokes::where('joke_status',0)->inRandomOrder()->first();
        if(isset($joke)){
            return view('pages.homepage')->with(compact('joke'));
        }
        else{
            Session::put('messages',"That's all the jokes for today! Come back another day!");
            return redirect('/');
        }

    }
    public function nonice($joke_id){
        $status = Jokes::where('joke_id', $joke_id)->first();
        $status->joke_status = 2;
        $status->update();
        $joke = Jokes::where('joke_status',0)->inRandomOrder()->first();
        return view('pages.homepage')->with(compact('joke'));
    }
    public function reset(){
        $all = Jokes::all();
        foreach($all as $one){
            $one->joke_status = 0;
            $one->update();
        }
        Session::flush();
        return redirect('/');
    }
}
