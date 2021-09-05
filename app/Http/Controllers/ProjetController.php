<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use DB;
use App\Models\User;
use App\Models\Projet;
use App\Models\Event;
use App\Notifications\ProjetNotification;
use App\Notifications\AdminNotification;
use Brian2694\Toastr\Facades\Toastr;


class ProjetController extends Controller
{

    
    public function addProjet()
    {
       
        $users = User::all();
       
        return view('projets.add-projet',compact('users'));
    }

    public function getProjet()
    {
        /*$users = User::join('posts', 'users.id', '=', 'posts.user_id')
        ->get(['users.*', 'posts.descrption']);*/

        $users = User::all();
        $projets = Projet::with('user')->get();
       
        return view('projets.projet',compact('projets','users'));
       
    }
    public function getProjetid()
    {   
        $var = Auth::user()->id;
        $users = User::all();
        $projets = Projet::where('id_chef','like','%'.$var.'%')->get();
       
        return view('projets.projetchef',compact('projets','users'));
       
    }
    public function createProjet(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required',
            'file' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf|max:2048',
            'client' => 'required',
            'chef'  => 'required',
            'datedeb' => 'required|date|before:datefin|after:today',
            'datefin' => 'required|date|after:datedeb',
            'etat' => 'required',
            'demo1' => 'required',
            

        ]);

        $file = time().'.'.$request->file->extension();  
        $request->file->move(public_path('uploads'), $file);

        $event = Event::create([
            'title'		=>	$request->titre,
            'chef'		=>	$request->chef,
            'start'		=>	$request->datedeb,
            'end'		=>	$request->datefin
        ]);
         $user= User::find($request->chef);
        try{
        $projet = new Projet();
        $projet->titre_projet         = $request->titre;
        $projet->description          = $request->description;
        $projet->document             = $file;
        $projet->id_client            = $request->client;
        $projet->id_chef              = $request->chef;
        $projet->date_debut           = $request->datedeb;
        $projet->date_fin             = $request->datefin;
        $projet->etat                 = $request->etat;
        $projet->taux_avancement      = $request->demo1;
        $projet->save();
        DB::commit();
        Toastr::success('New Project created successfully :)','Success');
        Notification::send($user, new ProjetNotification($request->titre));
        return back();
        }catch(\Exception $e){
        DB::rollback();
        Toastr::error(' Add new projet fail :)','Error');
        return redirect()->back();
        }
       
        
        
      
    }

    public function updateProjet(Request $request)
    {
        $old_file = Projet::find($request->idprojet);
        $file_name = $request->hidden_file;
        $file = $request->file('file');
       if($file != '')
       {
            $file_name = rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $file_name);
        }  
          
        try{
        $projet = Projet::find($request->idprojet);
        $projet->titre_projet         = $request->titre;
        $projet->document             = $file_name;
        $projet->id_client            = $request->client;
        $projet->id_chef              = $request->chef;
        $projet->date_debut           = $request->datedeb;
        $projet->date_fin             = $request->datefin;
        $projet->etat                 = $request->etat;
        $projet->taux_avancement      = $request->demo1;
        $projet->save();
        DB::commit();
        Toastr::success('Projet updated successfully :)','Success');
        return back();
    }catch(\Exception $e){
        DB::rollback();
        Toastr::error(' Projet updated fail :)','Error');
        return redirect()->back();
        }

    }

    public function updateEtat(Request $request)
    {
        $c4 = 1;
        $user= User::find(1);
        $et = 'Terminé';
        try{
        $projet = Projet::find($request->idprojet);
        $projet->etat                 = $request->etat;
        $projet->taux_avancement      = $request->demo1;
        $projet->save();
        DB::commit();
        Toastr::success('Projet updated successfully :)','Success');
        if($request->etat === $et)
        {
            Notification::send($user, new AdminNotification($request->titreprojet));
        }
        return back();
    }catch(\Exception $e){
        DB::rollback();
        Toastr::error(' Projet updated fail :)','Error');
        return redirect()->back();
        }

    }

    public function delete($id,$id_chef)
    {
        $projet = Projet::where('id',$id)->delete();
        $event = Event::where('chef',$id_chef)->delete();
        Toastr::success('Projet deleted successfully :)','Success');
        return back();
    }
    public function fermer($id)
    {
        $e = 'fermé';

        $update = [
            'etat'       => $e,
        ];

        $projet = Projet::where('id',$id)->update($update);
        Toastr::success('Projet closed successfully :)','Success');
        return back();
    }

    public function download(Request $request,$document)
   {
         return response()->download(public_path('uploads/'.$document));
   }
   
}
