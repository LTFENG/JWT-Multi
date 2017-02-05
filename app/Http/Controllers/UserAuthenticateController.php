<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserAuthenticateController extends Controller
{
	public function signUp(Request $request)
	{
		$credentials = $request->only('name','email', 'password');
		try
		{
		//$user = User::create($credentials);
			$user = New User;
        	$user->name = $request->input('name');
        	$user->email = $request->input('email');
        	$user->password = bcrypt($request->input('password'));
        	$user->telephone = $request->input('telephone');
        	$user->birthday = $request->input('birthday');
        	$user->gender = $request->input('gender');
        	$user->races = $request->input('races');
        	$user->save();
		}
		catch(JWTException $e)
		{
			return response()->json(['error' =>'User Already exists'],404);
		}

		$token = JWTAuth::fromUser($user);

   		return response()->json(compact('token'));
	}

	public function signIn(Request $request)
	{	
		$credentials = $request->only('email', 'password');

	   if ( ! $token = JWTAuth::attempt($credentials)) 
	   {
	       return response()->json(['error' =>'User Not Found'],404);
	   }

	   return response()->json(compact('token'));
	}
}
