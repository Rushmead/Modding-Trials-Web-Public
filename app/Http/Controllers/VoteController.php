<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Vote;
use App\Mod;
use Webpatser\Uuid\Uuid;
use Log;
class VoteController extends Controller
{
    public function votePage(){
        return redirect('/');
        $mods = Mod::all();
        foreach($mods as $mod){
            $authors = explode(',', $mod->authorList);
            $authorString = "";
            if(sizeof($authors) == 1){
                $authorString = $authors[0];
                $mod->authors = $authorString;
                continue;
            }
            foreach($authors as $key => $author){
                if($key == 0){
                    $authorString .= $author;
                    continue;
                }
                $authorString .= ", " . $author;
            }
            $mod->authors = $authorString;
        }

        return view('votes.vote')->with('mods', $mods);
    }

    public function categorys(){
        $categorys = Category::all();
        return json_encode(array('success' => true, 'categories' => $categorys));
    }

    public function vote(Request $response){
        return json_encode(array('success' => false));
        $category_id = $response->category;
        $mod_id = $response->mod;
        $ip = $response->ip();
        Log::debug($ip . " Voted " . $mod_id . " in category " . $category_id);
        $vote = Vote::where('ip', $ip)->where('category_id', $category_id)->first();
        if($vote != null){
            return json_encode(array('success' => false, 'error' => "You've already voted in this category!"));
        }
        $category = Category::where('id', $category_id)->first();
        Log::debug($category->id);
        if($category == null){
            return json_encode(array('success' => false, 'error' => "Something went wrong!"));
        }
        $mod = Mod::where('id', $mod_id)->first();
        Log::debug($mod->id);
        if($mod == null){
            return json_encode(array('success' => false, 'error' => "Something went wrong!"));
        }
        $newVote = new Vote;
        $newVote->id = Uuid::generate();
        $newVote->mod_id = $mod_id;
        $newVote->category_id =$category_id;
        $newVote->ip = $ip;
        $newVote->save();
        return json_encode(array('success' => true));
    }

    public function results(){
        $mods = Mod::all();
        $votes = array();
        foreach($mods as $mod){
            $authors = explode(',', $mod->authorList);
            $authorString = "";
            if(sizeof($authors) == 1){
                $authorString = $authors[0];
                $mod->authors = $authorString;
                continue;
            }
            foreach($authors as $key => $author){
                if($key == 0){
                    $authorString .= $author;
                    continue;
                }
                $authorString .= ", " . $author;
            }
            $mod->authors = $authorString;
            $mod->category1 = Vote::where('mod_id', $mod->id)->where('category_id', '1')->count();
            Log::debug($mod->name . ":" . $mod->category1);
            if($mod->category1 == 0)
                $mod->category1 = "None";
            $mod->category2 = Vote::where('mod_id', $mod->id)->where('category_id', '2')->count();
            if($mod->category2 == 0)
                $mod->category2 = "None";
            $mod->category3 = Vote::where('mod_id', $mod->id)->where('category_id', '3')->count();
            if($mod->category3 == 0)
                $mod->category3 = "None";
            $mod->total = Vote::where('mod_id', $mod->id)->count();
        }
        $mods = $mods->sortByDesc(function ($product, $key) {
            return $product->total;
        });
        return view('votes.results')->with('votes', $mods);
    }
}
