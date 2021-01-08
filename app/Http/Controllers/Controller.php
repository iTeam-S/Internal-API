<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function accueil(){
        $members = DB::table('membre')->get();
        echo json_encode($members);
    }

    public function list_mission_back(){
        $mission_back = DB::table('mission_equipe')->where('id_equipe', '3')->get();
        echo json_encode($mission_back);
    }
}
