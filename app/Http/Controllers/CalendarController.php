<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Projet;
class CalendarController extends Controller
{
    
    public function index(Request $request)
    {
        $var = Auth::user()->id;
        if($request->ajax())
    	{
    		$data = Event::where('chef','like','%'.$var.'%')
                       ->whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
    	}
        
        return view('calendriers/calendrier');
    }

    public function get(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
    	}
    	return view('calendriers/full-calender');
      
    }
    

    
   
}
