<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Module;
use App\Models\Projet;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
class ModuleController extends Controller
{
    public function ajouterM($id)
    {
        $projet = projet::find($id);
        return view('modules.add-module',compact('projet'));
    }


    public function createModule(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'date_debut_projet' => 'date',
            'date_fin_projet' => 'date',
            'date_debut' => 'required|date|before:date_fin|after:date_debut_projet',
            'date_fin' => 'required|date|after:date_debut|before:date_fin_projet',
           
        ]);
       
        try{
        $module = new Module();
        $module->titre_module          = $request->titre;
        $module->id_projet             = $request->titrem;
        $module->date_debut            = $request->date_debut;
        $module->date_fin              = $request->date_fin;
        $module->save();
        DB::commit();
        Toastr::success('Module created successfully :)','Success');
        return back();
        }catch(\Exception $e){
        DB::rollback();
        Toastr::error(' Add module fail :)','Error');
        return redirect()->back();
        }
        
       
      
    }

    public function getModule($id)
    {   
        $projets = projet::all();
        $modules = Module::where('id_projet','like','%'.$id.'%')
                          
                          ->get();

        return view('modules.module',compact('modules','projets'));
       
    }
    public function delete($id)
    {
        $module = Module::where('id',$id)->delete();
        Toastr::success('Module deleted successfully :)','Success');
        return back();
    }

    public function updateModule(Request $request)
    {
        try{
        $module = Module::find($request->idm);
        $module->titre_module = $request->titre;
        $module->date_debut = $request->datedeb;
        $module->date_fin = $request->datefin;
    
        $module->save();
        Toastr::success('Module updated successfully :)','Success');
        return back();
    }catch(\Exception $e){
        DB::rollback();
        Toastr::error(' Update module fail :)','Error');
        return redirect()->back();
        }

    }

}
