<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Image;
use Auth;
use Hash;


class UserController extends Controller
{
    //
    public function profile(){
    	return view('profile/profile', array('user' => Auth::user()) );
    }
    //
    public function avatar() {
        return View('profile/avatar');
    }
    //
    public function updateAvatar(Request $request){
    	if ($request->hasFile('avatar')) {
    		$avatar = $request->file('avatar');
    		$filename = Auth::user()->email . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/avatars/' . $filename) );
    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	} else {
            $filename = "default.png";
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
    	return redirect('profile')->with('status', 'Avatar cambiado con éxito');
    }
    //
    public function password(){
        return View('profile/password');
    }
    //
    public function updatePassword(Request $request){
        $rules = [
            'mypassword' => 'required',
            'password' => 'required|confirmed|min:6|max:18',
        ];
        
        $messages = [
            'mypassword.required' => 'El campo es requerido',
            'password.required' => 'El campo es requerido',
            'password.confirmed' => 'Los passwords no coinciden',
            'password.min' => 'El mínimo permitido son 6 caracteres',
            'password.max' => 'El máximo permitido son 18 caracteres',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('password')->withErrors($validator);
        }
        else{
            if (Hash::check($request->mypassword, Auth::user()->password)){
                $user = new User;
                $user->where('email', '=', Auth::user()->email)
                     ->update(['password' => bcrypt($request->password)]);
                return redirect('profile')->with('status', 'Contraseña cambiado con éxito');
            }
            else
            {
                return redirect('password')->with('message', 'Credenciales incorrectas');
            }
        }
    }
    //
    public function infoProfile() {
        return View('profile/infoprofile');
    }
    
    public function updateInfoProfile(Request $request) {
        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'nickname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'age' => 'required|int|min:18|max:128',
            'country' => 'required|string|min:2|max:3',
        ];
        
        $messages = [
            'first_name.required' => 'El campo Nombre es requerido',
            'last_name.required' => 'El campo Apellido es requerido',
            'nickname.required' => 'El campo Nombre de Usuario es requerido',
            'email.required' => 'El campo Correo es requerido',
            'age.required' => 'El campo Edad es requerido',
            'age.min(18)' => 'Edad minima requerida 18 años',
            'age.max(128)' => 'Edad maxima requerida 128 años',
            'country.max' => 'El campo Pais es requerido',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('infoprofile')->withErrors($validator);
        } else {
            $user = new User;
            $user->where('email', '=', Auth::user()->email)
                 ->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'nickname' => $request->nickname,
                    'email' => $request->email,
                    'age' => $request->age,
                    'country' => $request->country,
                 ]);
            return redirect('profile')->with('status', 'Informacion actualizada con éxito');
        }
    }
}
