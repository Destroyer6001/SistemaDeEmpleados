<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EditController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        return view('auth.edit',compact('user'));
    }

    public function update(Request $request,$id)
    {
        $user = User::find($id);

        if($request->input('newpassword') != null && $request->input('confirmatenewpassword') != null)
        {
            if(Hash::check($request->input('password'), $user->password))
            {
                if(!Hash::check($request->input('newpassword'), $user->password))
                {
                    if($request->input('newpassword') == $request->input('confirmatenewpassword') )
                    {
                        if(strlen($request->input('newpassword')) >= 8)
                        {
                            $user->username = $request->input('username');
                            $user->email = $request->input('email');
                            $user->password = $request->input('newpassword');
                            $user->save();
                            auth()->logout();
                            return redirect()->to('/');
                        }
                        else
                        {
                            return redirect()->back()->with('clavemenor',"La clave ingresada no cuenta con el numero de caracteres permitidos");
                        }
                    }
                    else
                    {
                        return redirect()->back()->with('clavesdiferentes','las nueva clave y la clave de confirmacion son diferentes');
                    }
                }
                else
                {
                    return redirect()->back()->with('clavesiguales','la nueva clave es igual a la vieja clave');
                }
            }
            else
            {
                return redirect()->back()->with('errorclave','la clave que ingresaste no es la correcta');
            }
        }
        else
        {
            $user->username = $request->input('username');
            $user->email = $request->input('email');
            $user->save();
            auth()->logout();
            return redirect()->to('/');
        }
    }
}
