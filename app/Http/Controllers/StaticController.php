<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class StaticController extends Controller
{

    public function index(){
        return view('static.index');
    }

    public function about(){
        return view('static.about');
    }

    public function rules(){
        return view('static.rules');
    }

    public function contact(){
        return view('static.contact');
    }

    public function join(){
        return redirect('/');
        return view('static.join');
    }

    public function results(){
        return view('static.results');
    }
}
