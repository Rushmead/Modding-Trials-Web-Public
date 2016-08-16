<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Competitor;
use App\Team;
use App\ConfirmationLink;
use Log;
use Uuid;
use Mail;
use Carbon\Carbon;
class EntryController extends Controller
{
    public function enter(){
        if((Carbon::now()->timestamp * 1000) > 1470135600000){
            return redirect('/');
        }
        return view('entry.entry');
    }

    public function newEntry(Request $request){
        $user = Competitor::where('email', $request->email)->first();
        if(isset($user)){
            return json_encode(array('success'=> false, 'error' => 'You have already entered!'));
        }
        $team = Team::where('email', $request->email)->first();
        if(isset($team)){
            return json_encode(array('success'=> false, 'error' => 'You have already entered!'));
        }
        if($request->type == "team"){
            $newTeam = new Team;
            $newTeam->id = Uuid::generate();
            $newTeam->members = $request->members;
            $newTeam->email = $request->email;
            $newTeam->source = $request->source;
            $newTeam->name = $request->name;
            if(isset($request->stream)) {
                $newTeam->stream = $request->stream;
            }
            $newTeam->save();
            return json_encode(array('success' => true));
        }else {
            $newTeam = new Competitor;
            $newTeam->id = Uuid::generate();
            $newTeam->username = $request->username;
            $newTeam->email = $request->email;
            $newTeam->source = $request->source;
            if(isset($request->stream)) {
                $newTeam->stream = $request->stream;
            }
            $newTeam->save();
            return json_encode(array('success' => true));
        }
    }

    public function competitors(){
        $competitors = Competitor::all();
        $competitors_original = Competitor::all();
        $teams = Team::all();
        foreach($competitors as &$entry){
            $entry->competitor_type = "Solo";
        }
        foreach ($teams as $team){
            $members = explode(",", $team->members);
            foreach($members as $member){
                $newEntry = new Competitor;
                $newEntry->id = Uuid::generate();
                $newEntry->username = $member;
                $newEntry->source = $team->source;
                if(strcasecmp($member, " lclc98") == 0){
                    $newEntry->stream = "https://beam.pro/lclc98";
                } else if (strcasecmp($member, "iLexiconn") == 0){
                    $newEntry->stream = "https://beam.pro/iLexiconn";
                }else {
                     $newEntry->stream = $team->stream;
                }

                if($team->name != ""){
                    Log::debug($team->logo);
                    if($team->logo != ""){
                        $newEntry->competitor_type = "<a onclick='return false;' tooltip-placement='top' uib-tooltip='" . $team->name ."'> <img src='/assets/img/teams/" . $team->logo . "' height='25'> </a>";
                    }else{
                        $newEntry->competitor_type = $team->name;
                    }
                }else{
                    $newEntry->competitor_type = $members[0] . "'s team";
                }
                $newEntry->created_at = $team->created_at;
                $competitors[sizeof($competitors) + 1] = $newEntry;
            }
        }
        $competitors = $competitors->sortByDesc("created_at");
        return view('entry.competitors')->with(['competitors' => $competitors, 'count' => sizeof($teams) + sizeof($competitors_original)]);
    }

    public function sendEmailToTeam($email, $subject,  $id)
    {
        $team = Team::where('id', $id)->first();
        Mail::send($email, ['team' => $team, 'subject' => $subject], function ($m) use ($team, $subject) {
            $m->from('no-reply@moddingtrials.xyz', 'Modding Trials');

            $m->to($team->email, explode(',', $team->members)[0])->subject($subject);
        });
    }
    public function sendEmailToCompetitor($email, $subject,  $id)
    {
        $competitor = Competitor::where('id', $id)->first();
        Mail::send($email, ['competitor' => $competitor], function ($m) use ($competitor, $subject) {
            $m->from('no-reply@moddingtrials.xyz', 'Modding Trials');

            $m->to($competitor->email, $competitor->username)->subject($subject);
        });
    }
}
