<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Projet;
use App\Models\User;
use App\Models\Roles;
use App\Models\Tache;
use Illuminate\Support\Facades\Auth;
class ChartController extends Controller
{
    public function barChart()
    {

$taux = DB::table('projets')->pluck('taux_avancement');
$names = DB::table('projets')->pluck('titre_projet');
$month = [];
$data = [];
foreach($names as $name)
{
   
    $month[] = $name;
   
}
foreach($taux as $t)
{
    $data[]  = $t;
}

$var = Auth::user()->id;
$tau = DB::table('projets')
->where('id_chef','like','%'.$var.'%')
->pluck('taux_avancement');
$titre = DB::table('projets')
->where('id_chef','like','%'.$var.'%')
->pluck('titre_projet');
$titrechef = [];
$taux = [];
foreach($titre as $name)
{
   
    $titrechef[] = $name;
   
}
foreach($tau as $t)
{
    $taux[]  = $t;
}
$c2 = 4; $c3 = 2; $c4 = 3;
$count1 = DB::table('projets')->count();
$count2 = DB::table('role_user')
        ->where('role_id','like','%'.$c2.'%')
        ->count();
$count3 = DB::table('role_user')
        ->where('role_id','like','%'.$c3.'%')
        ->count();
$count4 = DB::table('role_user')
        ->where('role_id','like','%'.$c4.'%')
        ->count();
$client = Auth::user()->id;       
$countcl = DB::table('projets')
        ->where('id_client','like','%'.$client.'%')
        ->count();

$result=DB::select(DB::raw("select count(*) as total_etat,etat 
                            from projets group by etat"));     
$result2=DB::select(DB::raw("select count(*) as total_e,etat 
                            from projets where id_chef=$var group by etat"));
                           
 $chartData="";
 $chartData2="";
 foreach($result as $list)
 {
    $chartData.="['".$list->etat."',   ".$list->total_etat."],";  
 } 
 $datas=$chartData;  
 foreach($result2 as $list)
 {
    $chartData2.="['".$list->etat."',   ".$list->total_e."],";  
 } 
 $datas2=$chartData2;
 
$us = Auth::user()->id;
$user = User::find(1);
$taches = Tache::where('id_membre','like','%'.$us.'%')->get();
$tachesD = Tache::where('id_membre','like','%'.$us.'%')
->orderByDesc('id')
->limit(3)
->get();
$projets = Projet::where('id_client','like','%'.$us.'%')
->get();
$e1= 'En attente';
$e2= 'En cours';
$e3= 'Terminé';
$ct1 = DB::table('taches')
        ->where('id_membre','like','%'.$us.'%')
        ->where('etat','like','%'.$e1.'%')
        ->count();
$ct2 = DB::table('taches')
        ->where('id_membre','like','%'.$us.'%')
        ->where('etat','like','%'.$e2.'%')
        ->count();
$ct3 = DB::table('taches')
        ->where('id_membre','like','%'.$us.'%')
        ->where('etat','like','%'.$e3.'%')
        ->count();
 return view('accueil',['Months' => $month, 'Data' => $data, 'Titre' => $titrechef, 'Tau' => $taux, 'Count1' => $count1, 'Count2' => $count2, 'countcl' => $countcl,'tachesD' => $tachesD,
 'Count3' => $count3, 'Count4' => $count4, 'Datas' => $datas, 'Datas2' => $datas2, 'taches' => $taches, 'ct1' => $ct1, 'ct2' => $ct2, 'ct3' => $ct3, 'user' => $user, 'projets' => $projets]);

}    


}
