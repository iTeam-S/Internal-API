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
        // TSY AZO AMBANAKA ANY AMN INTERNET NY INFORMATION NY OLONA sensible ;) 
        // $members = DB::table('membre')->get();
        echo "Route Pour API iTeam-$";
    }

    public function list_mission_back(){
        $mission_back = DB::table('mission_equipe')->where('id_equipe', '3')->get();
        echo json_encode($mission_back);
    }
    
    public function list_membre(){
        $membre = DB::select('SELECT nom, prenom, user_github, poste From membre');
        echo json_encode($membre);
    } 
    
    public function insertion(){
        Post::create(request()->all());
        echo json_encode('create');
    }
    
    public function membre_UI_UX($final=true){
        $membre_UI_UX = DB::select('SELECT prenom_usuel, CONCAT(m.nom, " ", m.prenom) AS nom_complet, user_github_pic, p.nom AS nom_poste, facebook, CONCAT("https://linkedin.com/in", linkedin) AS Linkedin FROM membre m JOIN fonction f ON m.id = f.id_membre JOIN poste p ON f.id_poste = p.id JOIN equipe e ON e.id = f.id_equipe WHERE e.id = 1 AND m.id <> 1');
        $mission_UI_UX = DB::select("SELECT GROUP_CONCAT(mission, '. \n') AS mission FROM mission_equipe GROUP BY id_equipe HAVING id_equipe = 1");
        $res = ["nom" => "Equipe UI & UX", "missions" => $mission_UI_UX, "membres" => $membre_UI_UX];
        if ($final) 
            echo json_encode($res);
        else
            return $res;
    }
    
    public function membre_qualité_exploitation($final=true){
        $membre_qualité_exploitation = DB::select('SELECT prenom_usuel, CONCAT(m.nom, " ", m.prenom) AS nom_complet, user_github_pic, p.nom AS nom_poste, facebook , CONCAT("https://linkedin.com/in", linkedin) AS Linkedin FROM membre m JOIN fonction f ON m.id = f.id_membre JOIN poste p ON f.id_poste = p.id JOIN equipe e ON e.id = f.id_equipe WHERE e.id = 2');
        $mission_qualité_exploitation = DB::select("SELECT GROUP_CONCAT(mission, '. \n') AS mission FROM mission_equipe GROUP BY id_equipe HAVING id_equipe = 2");
        $res = ["nom" => "Equipe Qualité & Exploitation", "missions" => $mission_qualité_exploitation, "membres" => $membre_qualité_exploitation];
        if ($final) 
            echo json_encode($res);
        else
            return $res;
    }
    
    public function membre_back($final=true){
        $membre_back = DB::select('SELECT prenom_usuel, CONCAT(m.nom, " ", m.prenom) AS nom_complet, user_github_pic, p.nom AS nom_poste, facebook , CONCAT("https://linkedin.com/in", linkedin) AS Linkedin FROM membre m JOIN fonction f ON m.id = f.id_membre JOIN poste p ON f.id_poste = p.id JOIN equipe e ON e.id = f.id_equipe WHERE e.id = 3 AND m.id <> 1');
        $mission_back = DB::select("SELECT GROUP_CONCAT(mission, '. \n') AS mission FROM mission_equipe GROUP BY id_equipe HAVING id_equipe = 3");
        $res = ["nom" => "Equipe Back", "missions" => $mission_back, "membres" => $membre_back];
        if ($final) 
            echo json_encode($res);
        else
            return $res;

    }
    
    public function membre_admin($final=true){
        $membre_admin = DB::select('SELECT prenom_usuel, CONCAT(m.nom, " ", m.prenom) AS nom_complet, user_github_pic, p.nom AS nom_poste, facebook , CONCAT("https://linkedin.com/in", linkedin) AS Linkedin FROM membre m JOIN fonction f ON m.id = f.id_membre JOIN poste p ON f.id_poste = p.id JOIN equipe e ON e.id = f.id_equipe WHERE e.id = 4 AND m.id <> 1');
        $mission_admin = DB::select("SELECT GROUP_CONCAT(mission, '. \n') AS mission FROM mission_equipe GROUP BY id_equipe HAVING id_equipe = 4");
        $res = ["nom" => "Equipe Admin", "missions" => $mission_admin, "membres" => $membre_admin];
        if ($final) 
            echo json_encode($res);
        else
            return $res;
    }

//affichage du liste des membres actifs
    public function membre_actif(){
        $actif = DB::select("SELECT CONCAT(m.nom, ' ', m.prenom) AS fullname, prenom_usuel, user_github, user_github_pic, facebook, linkedin, mail, p.nom AS nom_poste FROM membre m JOIN fonction f ON m.id = f.id_membre JOIN poste p ON f.id_poste = p.id where m.actif = True");
        echo json_encode($actif);
    }
   
    public function membres(){
        $ui_ux = $this->membre_UI_UX(false);
        $QE = $this->membre_qualité_exploitation(false);
        $back = $this->membre_back(false);
        $admin = $this->membre_admin(false);
        $res = [$ui_ux,$QE,$back,$admin];
        echo json_encode($res);
    }

    
    
}