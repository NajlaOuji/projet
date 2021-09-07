<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use App\Models\Conversation;
use App\Models\Message;
use App\Notifications\ConverNotification;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Notification;
use Brian2694\Toastr\Facades\Toastr;

class UserController extends Controller
{
    
    public function getUser()
    {
      
       $users = User::all();
      
        return view('utilisateurs.utilisateur',compact('users'));

    }

    public function addUser()
    {
        return view('utilisateurs.add-user');
    }
 

    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
           
            'email' => 'required|string|email|max:255|unique:users',
            'phone'     => 'required|min:11|numeric',
            'password'  => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
            /*'password' => ['required', 'confirmed', Rules\Password::defaults()],*/

        ]);

        

     $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone,
            'password' => Hash::make($request->password),
        
        ]);
        $user->attachRole($request->role_id);
        Toastr::success('Create new account successfully :)','Success');
        return back();
      
    }
   
   
    public function update(Request $request)
    {
        $role = Roles::where('user_id',$request->id)->delete();
        $user = User::find($request->id);
        $user->name = $request->nom;
        $user->email = $request->email;
        $user->phone_number = $request->phone;
        /*$user->detachRole($user); */
        $user->attachRole($request->role_id);
        $user->save();
        Toastr::success('User updated successfully :)','Success');
        return back();

    }
    public function updateProfile(Request $request)
    {
        
       
      
        $id = $request->idp;
        $old_image = User::find($id);
        $image_name = $request->hidden_image;
        /*$image = $request->file('picture');*/

        $image = time().'.'.$request->picture->extension();  
        $request->picture->move(public_path('storage/users-avatar/'), $image);

        /*$image_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('storage/users-avatar/'), $image_name);
        unlink('storage/users-avatar/'.$old_image->avatar);*/
        $update = [  
            'avatar' => $image,
        ];
        User::where('id',$request->idp)->update($update);
        Toastr::success('picture updated successfully :)','Success');
        return back();

        
           
    }

    public function delete($id)
    {
        $user = User::where('id',$id)->delete();
        $role = Roles::where('user_id',$id)->delete();
        Toastr::success('User deleted successfully :)','Success');
        return back();
    }
   

    public function confirm(Request $request)
    {
        $user = User::find($request->id);

    
            $conversation = Conversation::create([
                'from' => auth()->user()->id,
                'to' => $user->id,
               
            ]);
    
            Message::create([
                'user_id' => auth()->user()->id,
                'conversation_id' => $conversation->id,
                'content' => "Bonjour."
            ]);
            Notification::send($user, new ConverNotification(auth()->user()->name));
            return back();
        

    }
   
}
