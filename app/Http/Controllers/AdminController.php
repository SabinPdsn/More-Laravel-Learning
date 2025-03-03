<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
public function CheckAdmin(Request $request){

  $data = Auth::attempt($request->only('email','password'));

  if($data){
        $Auth_user = Auth::user();

      if($Auth_user->role==='admin'){

        $token = $Auth_user->createToken('my_token')->plainTextToken;

        return response()->json([
        'Message'=>'welcome! Super Admin',
        'Admin-Token'=>$token
        ]);
        }
    }

}
}
