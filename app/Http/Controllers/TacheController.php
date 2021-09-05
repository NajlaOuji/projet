<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use App\Models\Module;
use App\Models\User;
use App\Notifications\TacheNotification;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Brian2694\Toastr\Facades\Toastr;
class TacheController extends Controller
{
    
    
    public function ajouterT($id)
    {
        $users = User::all();
        $module = module::find($id);
        return view('taches.add-tache',compact('module','users'));
    }


    public function getTacheid()
    {   
        $var = Auth::user()->id;
        $modules = module::all();
        $users = User::all();
        $taches = Tache::where('id_membre','like','%'.$var.'%')->get();
       
        return view('taches.tachemembre',compact('taches','users','modules'));
       
    }

    public function createTache(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required',
            'membre'  => 'required',
            'etat' => 'required',
            'demo1' => 'required',
            'date_debut_module' => 'date',
            'date_fin_module' => 'date',
            'date_debut' => 'required|date|before:date_fin|after:date_debut_module',
            'date_fin' => 'required|date|after:date_debut|before:date_fin_module',
           
        ]);
        $user= User::find($request->membre);
        try{
        $tache = new Tache();
        $tache->titre_tache           = $request->titre;
        $tache->id_module             = $request->module;
        $tache->description           = $request->description;
        $tache->id_membre             = $request->membre;
        $tache->etat                  = $request->etat;
        $tache->taux_avancement       = $request->demo1;
        $tache->date_debut            = $request->date_debut;
        $tache->date_fin              = $request->date_fin;
        $tache->save();
        DB::commit();
        Toastr::success('Tache created successfully :)','Success');
        Notification::send($user, new TacheNotification($request->titre));
        return back();
        }catch(\Exception $e){
        DB::rollback();
        Toastr::error(' Add Tache fail :)','Error');
        return redirect()->back();
        }
        
       
      
    }

    public function getTache($id)
    {   
        $users = User::all();
        $modules = module::all();
        $taches = Tache::where('id_module','like','%'.$id.'%')->get();
        return view('taches.tache',compact('taches','users','modules'));
       
    }

    public function updateTache(Request $request)
    {
        try{
        $tache = Tache::find($request->idt);
        $tache->titre_tache     = $request->titre;
        $tache->id_membre       = $request->membre;
        $tache->etat            = $request->etat;
        $tache->taux_avancement = $request->demo1;
        $tache->date_debut      = $request->date1;
        $tache->date_fin        = $request->date2;
    
        $tache->save();
        Toastr::success('Tache updated successfully :)','Success');
        return back();
    }catch(\Exception $e){
        DB::rollback();
        Toastr::error(' Update Tache fail :)','Error');
        return redirect()->back();
        }

    }
   

    public function delete($id)
    {
        $tache = Tache::where('id',$id)->delete();
        Toastr::success('Tache deleted successfully :)','Success');
        return back();
    }
    
    public function start($id)
    {
        $e = 'En cours';

        $update = [
            'etat'       => $e,
        ];

        $tache = Tache::where('id',$id)->update($update);
        return back();
    }
    public function finish($id)
    {
        $e = 'Terminé';
        $t = 100;
        $update = [
            'etat'       => $e,
            'taux_avancement'   =>$t,
        ];

        $tache = Tache::where('id',$id)->update($update);
        return back();
    }
    public function updateTaux(Request $request)
    {
        try{
            $tache = Tache::find($request->idt);
            $tache->taux_avancement = $request->demo1;
            $tache->save();
            Toastr::success('Taux updated successfully :)','Success');
            return back();
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error(' Update Taux fail :)','Error');
            return redirect()->back();
            }
    }
    public function updateT(Request $request)
    {
        try{
            $tache = Tache::find($request->idt);
            $tache->taux_avancement = $request->demo1;
            $tache->save();
            Toastr::success('Taux updated successfully :)','Success');
            return back();
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error(' Update Taux fail :)','Error');
            return redirect()->back();
            }
    }
    public function showTache($id)
    {
        $tache = tache::find($id);
        $users = User::all();
        $modules = module::all();
        return view('taches.show-tache',compact('tache','users','modules'));
    }
}
