<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Cookie;
use App\Category;
class AdminController extends Controller
{
    public function admin(Request $request){
        if(Cookie::get('logged') == $request->ip()){
            $categorys = Category::all();
            return view('admin.home')->with('categorys', $categorys);
        }else{
            return view('admin.login');
        }
    }
    
    public function login(Request $request){
        if($request->password == ""){
            return redirect('/admin');
        }
        if($request->password == env('ADMIN_PASSWORD', 'someRandomPassword')){
            return redirect('/admin')->withCookie('logged', $request->ip(), 120);
        }
        return redirect('/admin');
    }
}
